<?php
namespace App\Corp\domain\factory;
use App\Corp\domain\model\SavedCorpInfo;
class CorpFactory{

    public static function makeSaveCorpInfo($rquest){
        $id = $rquest->get('corpId');
        $sId = $rquest->get('slotId');
        $frgId = $rquest->get('fridgeId');
        return new SavedCorpInfo(
            $id = isset($id)?$rquest->get('corpId'):"",
            $corpseCode = is_null($rquest->get('corpseCode'))?"":$rquest->get('corpseCode'),
            $admissionDAte = is_null($rquest->get('admissionDate'))?"":$rquest->get('admissionDate') ,
            $collectionDate = is_null($rquest->get('collectionDate'))?"":$rquest->get('collectionDate'),
            $name = is_null($rquest->get('name'))?"": $rquest->get('name'),
            $age = is_null($rquest->get('age'))?"":$rquest->get('age'),
            $sex = is_null($rquest->get('sex'))?"":$rquest->get('sex'),
            $relativeName =is_null($rquest->get('relativeName'))?"":$rquest->get('relativeName'),
            $relativeContactOne = is_null($rquest->get('relativeContactOne'))?"":$rquest->get('relativeContactOne') ,
            $relativeContactTwo = is_null($rquest->get('relativeContactTwo'))?"":$rquest->get('relativeContactTwo'),
            $remarks = is_null($rquest->get('remarks'))?"":$rquest->get('remarks'),
            $releasedBy = is_null($rquest->get('releasedBy'))?"":$rquest->get('releasedBy'),
            $updatedAt = is_null($rquest->get('updatedAt'))?"":$rquest->get('releasedBy'),
            $hometown = is_null($rquest->get('hometown'))?"":$rquest->get('hometown'),
            $fridgeId = $frgId == "undefined"?"":$frgId,
            $slotId =  $sId == "null"?"":$sId,
            $category = is_null($rquest->get('category'))?"":$rquest->get('category')
        );
    }
}