<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->DATAbase();
    }

    /// Main Youtube Content Model ///

    public function getExamList() {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        $this->db->order_by("EXAM_TYPE_LIST.ETL_REG_DATE", 'DESC');
        return $this->db->get("EXAM_TYPE_LIST")->result();
    }

    public function getExamListByID($EID) {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        $this->db->where("EXAM_TYPE_LIST.ETL_SEQ", $EID);
        return $this->db->get("EXAM_TYPE_LIST")->result();
    }

    public function getExamListBySEQ($SEQ) {
        $this->db->select("DISTINCT(ETL_SEQ), ETL_ROUND, ETL_LEVEL, ETL_NAME, ETL_DATE, ETL_STATUS");
        $this->db->from("EXAM_TYPE_LIST AS ETL");
        $this->db->join("EXAM_PAPER_LIST AS EPL", "ETL.ETL_SEQ = EPL.EPL_RA_SEQ");
        $this->db->join("EXAM_PAPER_MARKER AS EPM", "EPL.EPL_SEQ = EPM.EPM_RA_SEQ");
        $this->db->where("EPM_ULM_SEQ", $SEQ);
        return $this->db->get()->result();
    }

    public function getExamListCntBySEQ($SEQ) {
        $this->db->select("DISTINCT(ETL_SEQ)");
        $this->db->from("EXAM_TYPE_LIST AS ETL");
        $this->db->join("EXAM_PAPER_LIST AS EPL", "ETL.ETL_SEQ = EPL.EPL_RA_SEQ");
        $this->db->join("EXAM_PAPER_MARKER AS EPM", "EPL.EPL_SEQ = EPM.EPM_RA_SEQ");
        $this->db->where("EPM_ULM_SEQ", $SEQ);
        return $this->db->get()->num_rows();
    }

    public function getPaperListByID($EID) {
        $this->db->select("EXAM_PAPER_LIST.EPL_SEQ AS EPL_SEQ, GROUP_CONCAT(ULM.ULM_NAME) AS MARKERS, GROUP_CONCAT(EPM.EPM_STATUS) AS STATUS, SUM(EPM.EPM_STATUS) AS STATUS_SUM, ULS.ULS_NO, ULS.ULS_NAME, EXAM_PAPER_LIST.EPL_RA_SEQ AS EPL_RA_SEQ");
        $this->db->where("EXAM_PAPER_LIST.EPL_DEL_YN", "N");
        $this->db->where("EXAM_PAPER_LIST.EPL_RA_SEQ", $EID);
        $this->db->from("EXAM_PAPER_LIST");
        $this->db->join("USER_LIST_STUDENT AS ULS", "EXAM_PAPER_LIST.EPL_STUDENT_SEQ = ULS.ULS_SEQ", "LEFT");
        $this->db->join("EXAM_PAPER_MARKER AS EPM", "EXAM_PAPER_LIST.EPL_SEQ = EPM.EPM_RA_SEQ", "LEFT");
        $this->db->join("USER_LIST_MARKER AS ULM", "EPM.EPM_ULM_SEQ = ULM.ULM_SEQ", "LEFT");
        $this->db->group_by("EXAM_PAPER_LIST.EPL_SEQ");
        $this->db->order_by("EXAM_PAPER_LIST.EPL_SEQ", "DESC");
        return $this->db->get()->result();
    }

    public function getPaperListByID2($EID) {
        $this->db->where("EXAM_PAPER_LIST.EPL_DEL_YN", "N");
        $this->db->where("EXAM_PAPER_LIST.EPL_RA_SEQ", $EID);
        $this->db->from("EXAM_PAPER_LIST");
        $this->db->join("USER_LIST_STUDENT", "EXAM_PAPER_LIST.EPL_STUDENT_SEQ = USER_LIST_STUDENT.ULS_SEQ", "LEFT");
        $this->db->order_by("EXAM_PAPER_LIST.EPL_SEQ", "DESC");
        return $this->db->get()->result();
    }

    public function getPaperCntByID($EID) {
        $this->db->where("EXAM_PAPER_LIST.EPL_DEL_YN", "N");
        $this->db->where("EXAM_PAPER_LIST.EPL_RA_SEQ", $EID);
        return $this->db->get("EXAM_PAPER_LIST")->num_rows();
    }

    public function getQuestionsCountByID($EID) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_RA_SEQ", $EID);
        return $this->db->get("EXAM_QUESTION_LIST")->num_rows();
    }

    public function getQuestionBySEQ($SEQ) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_SEQ", $SEQ);
        return $this->db->get("EXAM_QUESTION_LIST")->result();
    }

    public function getQuestionChildCountBySEQ($SEQ) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.PARENT_SEQ", $SEQ);
        return $this->db->from("EXAM_QUESTION_LIST")->count_All_results();
    }

    public function updateQuestionBySEQ($SEQ, $DATA) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_SEQ", $SEQ);
        return $this->db->update("EXAM_QUESTION_LIST", $DATA);
    }

    public function getQuestionsByID($EID) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_RA_SEQ", $EID);
        $this->db->order_by("EXAM_QUESTION_LIST.PARENT_SEQ");

        return $this->db->get("EXAM_QUESTION_LIST")->result();
    }

    public function getExamListCount() {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        return $this->db->get("EXAM_TYPE_LIST")->num_rows();
    }

    public function saveExamList($DATA) {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        return $this->db->insert('EXAM_TYPE_LIST', $DATA);        
    }

    public function saveQuestion($DATA) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        return $this->db->insert('EXAM_QUESTION_LIST', $DATA);        
    }


    public function addQuestionBelow($DATA){
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        return $this->db->insert('EXAM_QUESTION_LIST', $DATA);        
    }
    public function delQuestion($SEQ) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_SEQ", $SEQ);
        return $this->db->delete("EXAM_QUESTION_LIST");
    }

    public function delQuestionsChildren($SEQ) {
        $this->db->where("EXAM_QUESTION_LIST.PARENT_SEQ", $SEQ);
        return $this->db->delete("EXAM_QUESTION_LIST");
    }
    

    public function getSequence(){
        return $this->db->query("SELECT MAX(EQL_SEQ) FROM EXAM_QUESTION_LIST")->result();
    }

    public function getMarkerList(){
        $this->db->where("USER_LIST_MARKER.ULM_DEL_YN", "N");
        return $this->db->get("USER_LIST_MARKER")->result();
    }

    public function getMarkers($SEQ){
        $this->db->select("*");
        $this->db->where("EXAM_PAPER_MARKER.EPM_RA_SEQ", $SEQ);
        $this->db->from("EXAM_PAPER_MARKER");
        $this->db->join("USER_LIST_MARKER AS ULM", "ULM.ULM_SEQ = EXAM_PAPER_MARKER.EPM_ULM_SEQ");
        
        return $this->db->get()->result();
    }
        
    public function getStudent(){
        $this->db->where("USER_LIST_STUDENT.ULS_DEL_YN", "N");
        return $this->db->get("USER_LIST_STUDENT")->result();
    }

    public function getStudentBySEQ($SEQ){
        $this->db->where("USER_LIST_STUDENT.ULS_DEL_YN", "N");
        $this->db->where("USER_LIST_STUDENT.ULS_SEQ", $SEQ);
        return $this->db->get("USER_LIST_STUDENT")->result();
    }

    public function getMatchInfoBySEQ($SEQ){
        $this->db->where("EXAM_MATCH_LIST.EML_DEL_YN", "N");
        $this->db->where("EXAM_MATCH_LIST.EML_RA_SEQ", $SEQ);
        $this->db->order_by("EXAM_MATCH_LIST.EML_ULM_SEQ");

        return $this->db->get("EXAM_MATCH_LIST")->result();
    }

    public function getMatchInfoByMarker($SEQ, $MARKER_SEQ){
        $this->db->where("EXAM_MATCH_LIST.EML_DEL_YN", "N");
        $this->db->where("EXAM_MATCH_LIST.EML_RA_SEQ", $SEQ);
        $this->db->where("EXAM_MATCH_LIST.EML_ULM_SEQ", $MARKER_SEQ);
        return $this->db->get("EXAM_MATCH_LIST")->result();
    }

    public function updateMatchInfo($SEQ, $DATA){
        $this->db->where("EXAM_MATCH_LIST.EML_SEQ", $SEQ);
        return $this->db->update("EXAM_MATCH_LIST", $DATA);
    }

    public function getAttachList($SEQ){
        $this->db->where("EXAM_PAPER_ATTACH.PAPER_SEQ", $SEQ);
        return $this->db->get("EXAM_PAPER_ATTACH")->result();
    }

    public function insertPaperAttach($insertAttach){
        return $this->db->insert("EXAM_PAPER_ATTACH", $insertAttach);
    }

    public function insertPaperList($insertPaper){
        return $this->db->insert("EXAM_PAPER_LIST", $insertPaper);
    }

    public function insertMarkerInPaper($DATA){
        return $this->db->insert("EXAM_PAPER_MARKER", $DATA);
    }

    public function updateMarkerInPaper($DATA){
        return $this->db->update("EXAM_PAPER_MARKER", $DATA);
    }

    public function getMarkerInPaper($SEQ){
        $this->db->where("EXAM_PAPER_MARKER.EPM_RA_SEQ", $SEQ);
        return $this->db->get("EXAM_PAPER_MARKER")->result();
    }

    public function deletePaperAttach($file_seq){
        $this->db->where("ATTACH_SEQ", $file_seq);
        return $this->db->delete("EXAM_PAPER_ATTACH");
    }

    public function deletePaper($SEQ){
        $this->db->where("EPL_SEQ", $SEQ);
        return $this->db->delete("EXAM_PAPER_LIST");
    }

    public function deleteAttachFormPaper($SEQ){
        $this->db->where("PAPER_SEQ", $SEQ);
        return $this->db->delete("EXAM_PAPER_ATTACH");
    }

    public function deleteMarkerFromPaper($SEQ){
        $this->db->where("EPM_RA_SEQ", $SEQ);
        return $this->db->delete("EXAM_PAPER_MARKER");
    }

    public function deleteMatchFromPaper($SEQ){
        $this->db->where("EML_RA_SEQ", $SEQ);
        return $this->db->delete("EXAM_MATCH_LIST");
    }
    public function getNumberOfPaper($paper){
        $this->db->select("ETL_PAPER");
        $this->db->where("ETL_SEQ", $paper);
        return $this->db->get("EXAM_TYPE_LIST")->result();
    }
    public function insertMatchInfo($insert_match) {
        return $this->db->insert("EXAM_MATCH_LIST", $insert_match);
    }

}

