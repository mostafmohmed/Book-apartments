<?php
namespace App\service;
interface apartmentinterface{
public function create($request);
public function update($id, $request);
public function delete($id);
public function index();
}