<?php
namespace App\Helpers;

class AppHelper
{
    public function getMasterDocumentSequence($key,$collection,$val)
    {
        $cursor = $collection->aggregate([
            ['$match' => ['companyID' => (int)$key]],
            ['$sort' => ['_id' => -1]],
            ['$limit'=>1],
            ['$unwind' => '$'.$val],
            ['$sort' => [$val.'._id'=> -1]],
            ['$limit'=>1],
            ['$project' => [$val.'._id'=>1]],
        ]); 

        $lastID = 0;    
        foreach($cursor as $c1)
        {
            $xs = 0;
            $crr[$xs] = $c1[$val];
            $xs++;
            foreach($crr as $l1)
            {
                $lastID = $l1['_id'];
            }
        }

        $lastID += 1;
        $collection->updateOne(['companyID' => (int)$key],
                            ['$inc' => ['counter' => 1]]);
        return $lastID;
    }

    public function getNextSequence($name,$collection) 
    {
        $cursor = $collection->counter->find(['_id'=>$name]);
        $arr = iterator_to_array($cursor);
        $id = 0;
        foreach ($arr as $value) 
        {
            $id = $value['seq'];
        }
        $id += 1;

        $collection->counter->findOneAndUpdate(['_id'=>$name],['$set'=>['seq'=>$id]]);
        return $id;
    }

     public function showQueries()
     {
          dd(\DB::getQueryLog());
     }

     public static function instance()
     {
         return new AppHelper();
     }

     
}