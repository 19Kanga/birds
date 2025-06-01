<?php

function response($stat,$mes,$result){
    echo json_encode(['status' => $stat,"message"=>$mes,"result"=>$result]);
}