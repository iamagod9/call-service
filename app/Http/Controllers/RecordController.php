<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Record;
use Illuminate\Support\Facades\Response;
use Storage;

class RecordController extends Controller
{
    public function index()
    {
        $date = [
            'day' => request('day'),
            'mounth' => request('mounth'),
            'year' => request('year'),
        ];

        $divisions = Division::all();
        $records = Record::all();

        return view('records.index', compact('records', 'divisions', 'date'));
    }

    public function show()
    {
        $path = request('division_id') . '/' . request('year') . '/' . request('mounth') . '/' . request('day');

        if (Storage::disk('ftp')->exists($path)) {
            $files = Storage::disk('ftp')->allFiles($path);
        } else {
            return response()->view('records.index');
        }

        $fields = [];

        foreach ($files as $file) {
            $full_path = Storage::disk('ftp')->path($file);

            $file = explode('/', $file);

            $audio = explode('-', $file[5]);

            if ($audio[0] == 'out') {
                $type = 'Исходящий';
                $out_number = $audio[1];
                $in_number = $audio[2];
                $date = $audio[3];
                $time = $audio[4];
            } elseif ($audio[0] == 'in') {
                $type = 'Входящий';
                $in_number = $audio[1];
                $out_number = $audio[2];
                $date = $audio[3];
                $time = $audio[4];
            } elseif ($audio[0] == 'internal') {
                $type = 'Внутренний';
                $in_number = $audio[1];
                $out_number = $audio[2];
                $date = $audio[3];
                $time = $audio[4];
            } elseif ($audio[0] == 'external') {
                $type = 'Внешний';
                $in_number = $audio[1];
                $out_number = $audio[2];
                $date = $audio[3];
                $time = $audio[4];
            } else {
                $type = 'rg';
                $in_number = $audio[1];
                $out_number = $audio[2];
                $date = $audio[3];
                $time = $audio[4];
            }

            $fields[] = [
                'type' => $type,
                'in_number' => $in_number,
                'out_number' => $out_number,
                'date' => $date,
                'time' => $time,
                'full_path' => $full_path,
            ];
        }

        return view('records.show', compact('files', 'fields'));
    }

    public function download()
    {
        $file = request('file');

        return Storage::disk('ftp')->download($file);
    }

    public function stream()
    {
        $filePath = request()->input('file');
        $disk = Storage::disk('ftp');

        if (!$disk->exists($filePath)) {
            abort(404, 'Файл не найден.');
        }

        $fileStream = $disk->get($filePath);
        $mimeType = 'audio/mpeg';

        return Response::make($fileStream, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
        ]);
    }
}