<?php
namespace App\Controllers;
use App\Models\MediaModel;
use CodeIgniter\Controller;
class MediaController extends Controller
{
    public function index()
    {
        $mediaModel = new MediaModel();
        $media = $mediaModel->findAll();
        return view('admin/media/index', ['media' => $media]);
    }
    public function create()
    {
        return view('admin/media/create');
    }
    public function store()
    {
        $file = $this->request->getFile('media_file');
        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid');
        }

        $newName = $file->getRandomName();
        $uploadPath = FCPATH . 'assets/uploads/media';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $file->move($uploadPath, $newName);

        $mediaModel = new MediaModel();
        $mediaModel->insert([
            'file_name'   => $file->getClientName(),
            'file_path'   => 'uploads/media/' . $newName,
            'uploaded_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('admin/media'))->with('success', 'Media berhasil diupload');
    }
    public function edit($id)
    {
        $mediaModel = new MediaModel();
        $media = $mediaModel->find($id);
        return view('admin/media/edit', ['media' => $media]);
    }
    public function update($id)
    {
        // Update logic dummy
        return redirect()->to(base_url('admin/media'));
    }
    public function delete($id)
    {
        $mediaModel = new MediaModel();
        $media = $mediaModel->find($id);
        if ($media) {
            $filePath = FCPATH . $media['file_path'];
            if (is_file($filePath)) {
                @unlink($filePath);
            }
            $mediaModel->delete($id);
        }
        return redirect()->to(base_url('admin/media'))->with('success', 'Media dihapus');
    }
}
