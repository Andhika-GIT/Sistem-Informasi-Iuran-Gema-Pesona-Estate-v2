<?php

namespace App\Controllers;

use App\Models\ThreadModel;
use App\Models\KelolaAkunModel;
use App\Models\ReplyModel;

class Reply extends BaseController
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

    public function add($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'thread' => $this->thread->find($id)
        ];

        return view('reply/add', $data);
    }

    public function simpan($id)
    {
        $this->reply->save([
            'id_thread' => $id,
            'id_user' => $this->request->getVar('id_user'),
            'isi' => $this->request->getVar('isi')
        ]);

        session()->setFlashdata('pesan', 'reply berhasil ditambahkan');

        return redirect()->to('/thread/view/' . $id);
    }

    public function hapus($id)
    {
        $id_reply = $id_thread = $this->request->uri->getSegment(3);
        $id_thread = $this->request->uri->getSegment(4);
        $this->reply->delete($id_reply);

        session()->setFlashdata('pesan', 'reply berhasil dihapus.');

        return redirect()->to('/thread/view/' . $id_thread);
    }

    public function edit($id)
    {
        session();
        $dataReply = $this->reply->find($id);
        $dataThread = $this->thread->find($dataReply['id_thread']);

        $data = [
            'validation' => \Config\Services::validation(),
            'reply' => $dataReply,
            'thread' => $dataThread
        ];
        return view('reply/edit', $data);
    }

    public function update($id)
    {
        $id_thread = $this->request->getVar('id_thread');
        $this->reply->save([
            'id' => $id,
            'id_thread' => $id_thread,
            'id_user' => $this->request->getVar('id_user'),
            'isi' => $this->request->getVar('isi')
        ]);
        session()->setFlashdata('pesan', 'reply berhasil di ubah');
        return redirect()->to('/thread/view/' . $id_thread);
    }
}
