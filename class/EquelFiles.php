<?php
class EquelFiles 
{
    /**
     * Создает две директории с файлама (примерно 5000 в каждой) 
     */
    public function creatеDirectory()
    {
        $home = $_SERVER['DOCUMENT_ROOT'] . "/";
        $directoryОne = $home . "papka/direktory1";
        mkdir($directoryОne, 0777);
        $directoryTwo = $home . "papka/direktory2";
        mkdir($directoryTwo, 0777);
        $arrayString = array("Привет" ,"Как" , "Дела" , "?" ,  "Все" , "хорошо" , "Погода" , "за" , "окном" , "дождливая" );
        $quantityFiles = 5000;
        $rand = rand(0, 500);
        $quantityFilesDirectoryОne = $quantityFiles - $rand;
        $quantityFilesDirectoryTwo = $quantityFiles + $rand;
        for ($i = 0; $i < $quantityFilesDirectoryОne; $i ++) {
            $fileName = 'File' . strval($i) . '.txt';
            $openFile = fopen($home . "papka/direktory1/" . $fileName, 'w');
            for ($j = 0; $j < 4; $j ++){ 
                fwrite($openFile, $arrayString[rand(0, 9)]);
            }
            fclose($openFile);
        }
        for ($i = 0; $i < $quantityFilesDirectoryTwo; $i ++) {
            $fileName = 'Files' . strval($i) . '.txt';
            $openFile = fopen($home . "papka/direktory2/" . $fileName, 'w');
            for ($j = 0; $j < 4; $j ++){ 
                fwrite($openFile, $arrayString[rand(0, 9)]);
            }
            fclose($openFile);
        }

        return 'creatеDirectory';
    }

    public function findSharedFiles()// Находит общие (одинаковые) файлы в двух папках (сравнивается хэш файлов)
    {
        $home = $_SERVER['DOCUMENT_ROOT'] . '/';
        $directoryОne = $home . "papka/direktory1/";
        $directoryTwo = $home . "papka/direktory2/";
        $directoryОneIterator = new DirectoryIterator($directoryОne);
        $filesDirectoryОne = [];
        foreach ($directoryОneIterator as $fileInfo) { 
            if (!$fileInfo->isDot()){
                $filesDirectoryОne[$fileInfo->getPathname()] = md5_file($fileInfo->getPathname());
            }
        }
        $filesDirectoryTwo = [];
        $directoryTwoIterator = new DirectoryIterator($directoryTwo);
        foreach ($directoryTwoIterator as $fileInfo) {
            if (!$fileInfo->isDot()){
                $filesDirectoryTwo[$fileInfo->getPathname()] = md5_file($fileInfo->getPathname());
            }
        }
        $intersectionFilesDirectoryОneAndTwo = array_intersect($filesDirectoryОne, $filesDirectoryTwo);
        $intersectionFilesDirectoryTwoAndOne = array_intersect($filesDirectoryTwo, $filesDirectoryОne);
        $sharedFilesDirectoryОne = array_intersect($intersectionFilesDirectoryОneAndTwo, $filesDirectoryОne);
        $sharedFilesDirectoryTwo = array_intersect($intersectionFilesDirectoryTwoAndOne, $filesDirectoryTwo);
        
        return [
            array_keys($sharedFilesDirectoryОne),
            array_keys($sharedFilesDirectoryTwo),
            array_keys($filesDirectoryОne),
            array_keys($filesDirectoryTwo)
        ];
    }

    public function findUniqueFilesFirstFolder($sharedFilesDirectoryОne, $filesDirectoryОne)//Находит уникальные файлы в 1 директори
    {
        $uniqueFilesDirectoryОne = array_merge(array_diff($sharedFilesDirectoryОne, $filesDirectoryОne));

        return $uniqueFilesDirectoryОne; 
    }

    public function findUniqueFilesSecondFolder($sharedFilesDirectoryTwo, $filesDirectoryTwo)//Находит уникальные файлы во 2 директори
    {
        $uniqueFilesDirectoryTwo = array_merge(array_diff($sharedFilesDirectoryTwo, $filesDirectoryTwo)); 

        return $uniqueFilesDirectoryTwo;  
    }

    public function createThirdDirectory($sharedFilesDirectoryОne, $uniqueFilesDirectoryОne, $uniqueFilesDirectoryTwo )
    //Создает 3 директорию,  в которую  помещаются уникальные файлы, а так же общие в единичном экземпляре
    {
        $home = $_SERVER['DOCUMENT_ROOT'] . "/";
        $directoryThree = $home . "papka/direktory3/";
        mkdir($directoryThree, 0777);
        foreach ($uniqueFilesDirectoryОne as $nameFile){
            copy($nameFile, $directoryThree . strrchr($nameFile,"\\"));   
        }
        foreach ($uniqueFilesDirectoryTwo as $nameFile){
            copy($nameFile, $directoryThree . strrchr($nameFile,"\\"));   
        }
        foreach ($sharedFilesDirectoryОne as $nameFile){
            copy($nameFile, $directoryThree . strrchr($nameFile, "\\"));   
        } 

        return 'createThirdDirectory';
    }
}
