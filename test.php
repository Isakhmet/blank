<?php


echo 'hgell';

try {
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/template.docx');

    $templateProcessor->setValue('firstTeam', 'Lion City');
    $templateProcessor->setValue('secondTeam', 'Chelsea');

    $first = array(
        array(
            'firstUserNumber' => 1,
            'firstUserName' => 'Филиппов Дмитрий',
            'secondUserNumber' => 1,
            'secondUserName' => 'Филиппов Дмитрий',
        ),
        array(
            'firstUserNumber' => 2,
            'firstUserName' => 'Абдильдаев Тауржан',
            'secondUserNumber' => 1,
            'secondUserName' => 'Филиппов Дмитрий',
        ),
        array(
            'firstUserNumber' => 3,
            'firstUserName' => 'Абитбеков Куат',
            'secondUserNumber' => 1,
            'secondUserName' => 'Филиппов Дмитрий',
        )
    );

    $values = array(
        array(
            'userId'        => 1,
            'userFirstName' => 'James',
            'userName'      => 'Taylor',
            'userPhone'     => '+1 428 889 773',
        ),
        array(
            'userId'        => 2,
            'userFirstName' => 'Robert',
            'userName'      => 'Bell',
            'userPhone'     => '+1 428 889 774',
        ),
        array(
            'userId'        => 3,
            'userFirstName' => 'Michael',
            'userName'      => 'Ray',
            'userPhone'     => '+1 428 889 775',
        ),
    );

    $templateProcessor->cloneRowAndSetValues('firstUserNumber', $first);
//$templateProcessor->cloneRowAndSetValues('userId', $values);


    echo date('H:i:s'), ' Saving the result document...', EOL;
    $templateProcessor->saveAs('results/template.docx');

    echo getEndingNotes(array('Word2007' => 'docx'), 'results/Sample_07_TemplateCloneRow.docx');
    if (!CLI) {
        include_once 'Sample_Footer.php';
    }
}catch (Exception $exception) {
    die(var_dump($exception));
}
