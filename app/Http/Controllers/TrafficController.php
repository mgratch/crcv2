<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Models\User;
use FileUploader;
use Illuminate\Support\Facades\Storage;

class TrafficController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('traffic.create');
    }

    public function index()
    {
        return view('traffic.index');
    }

    public function show(Traffic $traffic)
    {
        $enteredBy = User::where('id', $traffic->user_id)->first();

        return view('traffic.show', compact('traffic', 'enteredBy'));
    }

    public function store()
    {
        return redirect('traffic/' . $traffic->id);
    }

    public function edit(Traffic $traffic)
    {
        return view('traffic.edit', compact('traffic'));
    }

    public function update(Traffic $traffic)
    {

        $salesman = implode(",", request('salesman'));

        $data = request()->validate([
            'salesman' => 'required',
            'branch' =>'required',
            'rerent' => '',
            'io' =>'',
            'make' =>'',
            'model' =>'',
            'sn' =>'',
            'hours' => '',
            'fuel' => '',
            'attachments' => '',
            'damages' => '',
            'customer' =>'',
            'comments' => '',
        ]);

        $traffic->update([
            'salesman' => $salesman,
            'branch' => $data['branch'],
            'rerent' => $data['rerent'],
            'io' => $data['io'],
            'make' => $data['make'],
            'model' => $data['model'],
            'sn' => $data['sn'],
            'hours' => $data['hours'],
            'fuel' => $data['fuel'],
            'attachments' => $data['attachments'],
            'damages' => $data['damages'],
            'customer' => $data['customer'],
            'comments' => $data['comments'],
        ]);

        $field = 'filenames';
        $uploadDir = 'storage/uploads/';

        // create an empty array
        // we will add to this array the files from directory below
        // here you can also add files from MySQL database
        $preloadedFiles = array();

        // scan uploads directory
        foreach ($traffic->details as $detail) {
            $trafficfile[] = $detail->name;
            $trafficid[] = $detail->id;
        }

        if (!empty($trafficfile)) {
            $uploadsFiles = $trafficfile;
            $uploadsId = $trafficid;
        }

        if (!empty ($uploadsFiles)) {
            // add files to our array with
            // made to use the correct structure of a file
            foreach (array_combine($uploadsFiles, $uploadsId) as $file => $uid) {
                // skip if directory
                if (is_dir($uploadDir . $file))
                    continue;

                // skip if thumbnail
                if (substr($uploadDir . $file, 0, 6) == 'thumb_')
                    continue;

                // add file to our array
                // !important please follow the structure below
                // PC: E:/OneDrive/Development/crc/public/
                // Laptop: C:/Users/mschu/OneDrive/Development/crc/public/
                $preloadedFiles[] = array(
                    "name" => $file,
                    "type" => FileUploader::mime_content_type($uploadDir . $file),
                    "size" => filesize($uploadDir . $file),
                    "file" =>  config('url') . '/' . $uploadDir . $file,
                    "relative_file" => Storage::disk('storage')->get('uploads/' . $file),
                    "detail_id" => $uid
                );
            }
        }

        // initialize FileUploader
        $FileUploader = new FileUploader($field, array(
            'limit' => 10,
            'maxSize' => null,
            'extensions' => null,
            'uploadDir' => $uploadDir,
            'title' => 'auto',
            'files' => $preloadedFiles,
        ));

        // unlink the files
        // !important only for preloaded files
        // you will need to give the array with the preloaded files in 'files' option of the FileUploader
        foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
            $file = $value['relative_file'];
            $thumb = $uploadDir . 'thumbs/' . $value['name'];

            if (is_file($file))
                unlink($file);
            $traffic->details()->findOrFail($value['detail_id'])->delete();
            if (is_file($thumb))
                unlink($thumb);
        }

        // call to upload the files
        $upload = $FileUploader->upload();

        if ($upload['isSuccess']) {
            foreach($upload['files'] as $key=>$item) {
                $upload['files'][$key] = array(
                    $traffic->details()->updateOrCreate([
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
        }

        return redirect("/traffic/{$traffic->id}");
    }
}
