<?php

namespace App\Http\Livewire\Traffic;

use App\Models\Details;
use App\Models\User;
use Illuminate\Http\Testing\MimeType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Traffic;
use Livewire\WithFileUploads;
use FileUploader;

class Form extends Component
{
    use WithFileUploads;

    public $salesman;
    public $branch;
    public $rerent;
    public $io;
    public $make;
    public $model;
    public $sn;
    public $hours;
    public $fuel;
    public $attachments;
    public $damages;
    public $customer;
    public $comments;
    public $users;
    public $traffic;
    public $details = [];
    public $uploadedFile;

    public function mount($traffic)
    {

        if($traffic){

            //Edit Traffic
            $this->traffic = $traffic;
            $this->salesman = explode(', ', $traffic->salesman);
            $this->branch = $traffic->branch;
            $this->rerent = $traffic->rerent;
            $this->io = $traffic->io;
            $this->make = $traffic->make;
            $this->model = $traffic->model;
            $this->sn = $traffic->sn;
            $this->hours = $traffic->hours;
            $this->fuel = $traffic->fuel;
            $this->attachments = $traffic->attachments;
            $this->damages = $traffic->damages;
            $this->customer = $traffic->customer;
            $this->comments = $traffic->comments;

            //WIP Initial Files on edit for filepond
            foreach ($traffic->details as $detail) {
                $uploadedFile[] = $detail->name;
            }

            $this->uploadedFile = implode(', ', $uploadedFile);

        } else {

            //New Traffic
            $this->traffic = null;
            $this->salesman = '';
            $this->branch = auth()->user()->branch;
            $this->rerent = 'No';
            $this->io = 'In';
            $this->make = 'Deere';
            $this->model = '';
            $this->sn = '';
            $this->hours = '';
            $this->fuel = '';
            $this->attachments = '';
            $this->damages = 'No';
            $this->customer = '';
            $this->comments = '';
        }

        //Find salesman for form
        $this->users = User::select('users.*')
            ->join('team_user', 'team_user.user_id', '=', 'users.id')
            ->where('team_user.team_id', '=', '5')
            ->orderBy('users.name')
            ->get();
    }


    //New livewire only form submission - save function.
    public function save()
    {

        $data = [
            'user_id' => auth()->user()->id,
            'salesman' => implode(', ', $this->salesman),
            'branch' => $this->branch,
            'rerent' => $this->rerent,
            'io' => $this->io,
            'make' => $this->make,
            'model' => $this->model,
            'sn' => $this->sn,
            'hours' => $this->hours,
            'fuel' => $this->fuel,
            'attachments' => $this->attachments,
            'damages' => $this->damages,
            'customer' => $this->customer,
            'comments' => $this->comments,
        ];

        //Edit traffic
        if ($this->traffic) {
            Traffic::find($this->traffic->id)->update($data);

        } else {
            //Save new traffic
            $traffic = Traffic::create($data);

            //Save new details for the traffic (images)
            foreach($this->details as $detail) {

                $filename = $detail->store('/', 'details');

                $traffic->details()->create([
                    'traffic_id' => $traffic->id,
                    'extension' => '',
                    'format' => MimeType::from($filename),
                    'file' => '',
                    'name' => $filename,
                    'size' => Storage::size('/details/' . $filename),
                    'size2' => '',
                    'title' => '',
                    'type' => '',
                    'url' => Storage::disk('details')->url($filename),
                ]);
            }
        }
    }


    //Old way with jquery fileuploader - submit function.
    public function submit()
    {

        $data = [
            'user_id' => auth()->user()->id,
            'salesman' => implode(', ', $this->salesman),
            'branch' => $this->branch,
            'rerent' => $this->rerent,
            'io' => $this->io,
            'make' => $this->make,
            'model' => $this->model,
            'sn' => $this->sn,
            'hours' => $this->hours,
            'fuel' => $this->fuel,
            'attachments' => $this->attachments,
            'damages' => $this->damages,
            'customer' => $this->customer,
            'comments' => $this->comments,
        ];

        if ($this->traffic) {
            Traffic::find($this->traffic->id)->update($data);
        } else {

            $field = 'filenames';
            $uploadDir = 'storage/uploads/';

            // initialize FileUploader
            $FileUploader = new FileUploader($field, array(
                // options
                'limit' => 10,
                'uploadDir' => public_path($uploadDir),
                'title' => 'auto'
            ));

            // upload
            $upload = $FileUploader->upload();

            dd($upload);

            $traffic = Traffic::create($data);

            if ($upload['isSuccess']) {
                foreach($upload['files'] as $key=>$item) {
                    $upload['files'][$key] = array(
                        $traffic->details()->create([
                            'traffic_id' => $traffic->id,
                            'extension' => $upload['files'][$key]['extension'],
                            'format' => $upload['files'][$key]['format'],
                            'file' => $uploadDir . $upload['files'][$key]['name'],
                            'name' => $upload['files'][$key]['name'],
                            'size' => $upload['files'][$key]['size'],
                            'size2' => $upload['files'][$key]['size2'],
                            'title' => $upload['files'][$key]['title'],
                            'type' => $upload['files'][$key]['type'],
                            'url' => 'http://localhost:8000/' . $uploadDir . $upload['files'][$key]['name'],
                        ]));
                }
            } else {
                foreach($upload['warnings'] as $error) {
                    // echo $error . '<br>';
                }
            }

        }
    }

    public function render()
    {
        return view('livewire.traffic.form');
    }
}
