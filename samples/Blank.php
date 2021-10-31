<?php

include_once "../vendor/autoload.php";
include_once 'Database.php';

class Blank
{
    public function download($firstTeamId, $secondTeamId)
    {
        $db = new Database();

        try {

            $team1 = $db->query("select * from teams where id=" . $firstTeamId);
            $team2 = $db->query("select * from teams where id=" . $secondTeamId);

            $team1 = $team1->fetch();
            $team2 = $team2->fetch();

            $first = [];
            $i = 0;
            foreach ($db->query("select * from players where team_id=" . $firstTeamId) as $row) {
                $first[$i]['firstUserNumber'] = $row['number'];
                $first[$i]['firstUserName'] = $row['name'];
                $first[$i]['secondUserNumber'] = '';
                $first[$i]['secondUserName'] = '';
                $i++;
            }

            $j = 0;
            foreach ($db->query("select * from players where team_id=" . $secondTeamId) as $row) {

                if(empty($first[$j]['firstUserNumber'])){
                    $first[$j]['firstUserNumber'] = '';
                    $first[$j]['firstUserName'] = '';
                }

                $first[$j]['secondUserNumber'] = $row['number'];
                $first[$j]['secondUserName'] = $row['name'];
                $j++;
            }


            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/template.docx');

            $templateProcessor->setValue('firstTeam', $team1['name']);
            $templateProcessor->setValue('secondTeam', $team2['name']);

            $templateProcessor->cloneRowAndSetValues('firstUserNumber', $first);
            $date = date('Y-m-d H-i-s');
            $templateProcessor->saveAs('results/'.$team1['name'].$team2['name'].$date.'.docx');
        } catch (Exception $exception) {
            die(var_dump($exception));
        }
    }
}
