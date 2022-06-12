<?php

namespace App\Controllers;

use App\Models\ThreadModel;
use App\Models\KelolaAkunModel;
use App\Models\ReplyModel;

class Thread extends BaseController
{
    protected $thread;
    protected $user;
    protected $reply;

    public function __construct()
    {
        $this->thread = new ThreadModel();
        $this->user = new KelolaAkunModel();
        $this->reply = new ReplyModel();
    }

    public function index()
    {
        $data = [
            'thread' => $this->thread->getThread()
        ];

        return view('thread/index', $data);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('thread/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,9024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,application/pdf,application/doc,application/docs,application/docx]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format file tidak benar'
                ]
            ]
        ])) {
            return redirect()->to('/thread/add')->withInput();
        }
        $file = $this->request->getFile('foto');
        $namaFile = $file->getName();
        $file->move('forum/', $namaFile);

        $nama = session()->get('nama');
        $this->thread->save([
            'nama' => $nama,
            'judul' => $this->request->getVar('judul'),
            'kategori' => $this->request->getVar('kategori'),
            'isi' => $this->request->getVar('isi'),
            'file' => $namaFile
        ]);

        session()->setFlashdata('pesan', 'thread berhasil ditambahkan');
        return redirect()->to('/thread');
    }

    public function hapus($id)
    {
        $this->thread->delete($id);

        session()->setFlashdata('pesan', 'thread berhasil dihapus.');

        return redirect()->to('/thread');
    }

    public function download($id)
    {
        $dataBerkas =  $this->thread->find($id);
        return $this->response->download('forum/' . $dataBerkas['file'], null);
    }

    public function view($id)
    {
        session();
        $dataReply = $this->reply->select('reply.id, reply.id_user, reply.isi, tb_user.nama, tb_user.foto, tb_user.role')->join('tb_user', 'tb_user.id=reply.id_user', 'left')->where('id_thread', $id)->get();

        $data = [
            'thread' => $this->thread->getThread($id),
            'reply' => $dataReply
        ];

        return view('thread/view', $data);
    }

    public function edit($id)
    {
        session();

        $data = [
            'validation' => \Config\Services::validation(),
            'thread' => $this->thread->getThread($id)
        ];

        return view('thread/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,9024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,application/pdf,application/doc,application/docs,application/docx]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format file tidak benar'
                ]
            ]

        ])) {
            return redirect()->to('/thread/' . $this->request->getVar('id'))->withInput();
        }
        $file = $this->request->getFile('foto');

        if ($file->getError() == 4) {
            $namaFile = $this->request->getVar('filelama');
        } else {
            $namaFile = $file->getName();
            $file->move('forum/', $namaFile);
            unlink('forum/' . $this->request->getVar('filelama'));
        }
        $this->thread->save([
            'id' => $id,
            'nama' => session()->get('nama'),
            'judul' => $this->request->getVar('judul'),
            'kategori' => $this->request->getVar('kategori'),
            'isi' => $this->request->getVar('isi'),
            'file' => $namaFile
        ]);
        session()->setFlashdata('pesan', 'thread berhasil diubah');
        return redirect()->to('/thread');
    }
}
