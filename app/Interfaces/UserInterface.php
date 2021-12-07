<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
interface UserInterface{
   
   // public function all(): Collection;
   // public function store(Request $request);
   public function model();
   
   public function store($data_array);

   public function update($id, $data_array);
   
   // public function show($id);

	// public function searchByKeyword($keyword);
	
	public function delete($id);
}