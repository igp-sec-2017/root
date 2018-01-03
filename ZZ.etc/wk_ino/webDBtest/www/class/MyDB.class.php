<?php
/*
 * MyDB�N���X
 */
class MyDB
{
    public $mysqli; // mysqli�I�u�W�F�N�g
    public $mode;   // �߂�l�̌`���F"json" or "array"�i�A�z�z��j
    public $count;  // SQL�ɂ���Ď擾�����s�� or �e�������s��

    // �R���X�g���N�^
    function __construct($mode = "json") 
    {
        $this->mode = $mode;

        // DB�ڑ�
        $this->mysqli = new mysqli('mysql449.db.sakura.ne.jp', 'igp-sec-2017', '5931System','igp-sec-2017_db');
        if ($this->mysqli->connect_error) {
            echo $this->mysqli->connect_error;
            exit;
        } else {
            $this->mysqli->set_charset("utf8");
        }
    }

    // �f�X�g���N�^
    function __destruct()
    {
        // DB�ڑ������
        $this->mysqli->close();
    }

    // SQL���s�iSELECT/INSERT/UPDATE/DELETE �ɑΉ��j
    function query($sql)
    {
        // SQL���s
        $result = $this->mysqli->query($sql);
        // �G���[
        if ($result === FALSE) {
            // �G���[���e
            $error = $this->mysqli->errno.": ".$this->mysqli->error;
            // �߂�l
            $rtn = array(
                'status' => FALSE,
                'count'  => 0,
                'result' => "",
                'error'  => $error
            );
            if($this->mode == "array")
                return $rtn;
            else
                return json_encode($rtn); // JSON�`���ŕԂ��i�f�t�H���g�j
        }

        // SELECT���ȊO
        if($result === TRUE) {
            // �e���̂������s�����i�[
            $this->count = $this->mysqli->affected_rows;
            // �߂�l
            $rtn = array(
                'status' => TRUE,
                'count'  => $this->count,
                'result' => "",
                'error'  => ""
            );
            if($this->mode == "array")
                return $rtn;
            else
                return json_encode($rtn); // JSON�`���ŕԂ��i�f�t�H���g�j
        } 
        // SELECT��
        else {
            // SELECT�����s�����i�[
            $this->count = $result->num_rows;
            // �A�z�z��Ɋi�[
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // ���ʃZ�b�g�����
            $result->close();
            // �߂�l
            $rtn = array(
                'status' => TRUE,
                'count'  => $this->count,
                'result' => $data,
                'error'  => ""
            );
            if($this->mode == "array")
                return $rtn;
            else
                return json_encode($rtn[result]); // JSON�`���ŕԂ��i�f�t�H���g�j
        }
    }

    // ��������G�X�P�[�v����
    function escape($str)
    {
        return $this->mysqli->real_escape_string($str);
    }
}
?>