<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class lib_Answer {
    
    private function loadModels () {
        $this->load->model('mdl_General','mdl_q');//question model
        $this->mdl_q->tableName = 'Question';
        $this->mdl_q->tableId = 'id_Question';
        $this->load->model('mdl_General','mdl_ans');//answer model
        $this->mdl_q->tableName = 'Answer';
        $this->mdl_q->tableId = 'id_Answer';
        $this->load->model('mdl_General','mdl_ac');//answer change model
        $this->mdl_q->tableName = 'AnswerChange';
        $this->mdl_q->tableId = 'id_AnswerChange';
    }
    
    /**
     * @param $ansArr: 'Answer_Type' - text of the answer
     *                 'Answer_Text' - type of the answer
     *                 'wComp_id_ThisQuetion' - this answer question id
     *        $chngArr: array of arrays, which have this fields:
     *                 'AnswerChange_TextChange' - text of changes
     *                 'wComp_Parametr_id_Parametr' - this answer change parametr id  
     * 
     * @return id of added answer
     */
    function addAnswerWithChanges ($ansArr, $chngArr) {
          $idAns = $this->mdl_ans->insert($ansArr);
          foreach ($chngArr as $el) {
            $el['wComp_Answer_id_Answer'] = $idAns;
            $this->mdl_ac->insert($el);
          }
    }
    /**
     * @param $qstnTxt - text of the questions
     *        $answers - array of arrays with fields:
     *          'type' - type of the question
     *          'Txt' - text of the answer
     *          'Cond' - array of condition parametr id
     *          'TxtCond' - array of answer change for conditions
     *          'Crit' - array of criterias parametr id
     *          'TxtCrit' - array of answer change for criterias
     */ 
    function addQuestionAndAnswers ($qstnTxt, $answers) {
        //question
        $qstnArr = array();
        $qstnArr['Question_Text'] = $qstnTxt;
        $idQstn = $this->mdl_q->insert($qstnArr);
        foreach ($answers as $ans) {
            //answer:
            $ansArr = array();
            $ansArr['Answer_Type'] = $ans['type'];
            $ansArr['Answer_Text'] = $ans['Txt'];
            $ansArr['wComp_id_ThisQuetion'] = $idQstn;
            
            //answer change:
            $chngArr = array();
            //answer change conditions:
            $cond = $ans['Cond'];
            $condtxt = $ans['TxtCond'];
            $i = 0;
            foreach ($cond as $c){
                $chng = array();
                $chng['AnswerChange_TextChange'] = $condtxt[$i];
                $chng['wComp_Parametr_id_Parametr'] = $c;
                $i++;
                $chngArr[] = $chng;
            }
            //answer change criteria:
            $crit = $ans['Crit'];
            $crittxt = $ans['TxtCrit'];
            $i = 0;
            foreach ($crit as $c){
                $chng = array();
                $chng['AnswerChange_TextChange'] = $crittxt[$i];
                $chng['wComp_Parametr_id_Parametr'] = $c;
                $i++;
                $chngArr[] = $chng;
            }
            
            //adding answer with criterias and conditions:
            $this->addAnswerWithChanges ($ansArr, $chngArr);
        }
    }
    
    
    
}

?>