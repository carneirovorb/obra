<?php

namespace App\Http\Controllers;

use App\Report;
use App\Work;
use App\Utils\Message;
use File;
use Illuminate\Http\Request;

/**
 * Controller for Report resource  
 *
 * Business logic.
 *
 * @package    amado-eng
 * @subpackage App\Http\Controllers
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class ReportController extends Controller
{
    /**
    * File storage Directory   
    *
    * @var string 
    */
    private $pathToFile;

    /**
     * $pathToFile init.
     */
    public function __construct()
    {
        $this->pathToFile = public_path() .'/reports';
    }

    /**
     * Validate file extension.
     *
     * @param  string  $extension
     * @return bool
     */
    private function verify(string $extension) : bool
    {
        $extension = strtolower($extension);
        if ($extension === 'jpg' || 
            $extension === 'png' || 
            $extension === 'xls' || 
            $extension === 'doc')
            return true;
        else return false;
    }

    /**
     * Upload report file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $resp = $this->verify($request->file('file_name')->getClientOriginalExtension());
        if ($resp) {
            $newName = time().'_'.$request->file('file_name')->getClientOriginalName();
            $request->file('file_name')->move($this->pathToFile, $newName);
            Report::create(['file_description'=> $request->file_description, 'work_id'=>$request->work_id, 'file_date'=>$request->file_date, 'file_name'=>$newName]);
            return redirect('works')->with('status', Message::success("Anexação", "relatório",'f'));
        }
        return redirect('works')->with('status', "Extensão de arquivo não permitida!");
    }

    /**
     * Download report file.
     *
     * @param  int $work_id
     * @param  int $report_id
     * @return \Illuminate\Http\Response
     */
    public function download(int $work_id, int $report_id)
    {
        $name = Report::find($report_id)->file_name;
        return response()->download($this->pathToFile .'/' . $name);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $work_id)
    {
        $reports = Work::find($work_id)->reports()->get();
        return view('works.report.show', compact('reports', 'work_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $work_id 
     * @param  int $report_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $work_id, int $report_id)
    {
        $report = Report::find($report_id);
        File::delete('reports/' . $report->file_name);
        $report->delete();
        return redirect('works')->with('status', Message::success("Remoção", "relatório"));
    }
}
