<?php
namespace App\service;
interface bookinginterface {
public function create($request,$apartment);

public function delete($id);
public function index();
}