<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
class Transaksi extends BaseController
{
    public function getReturnedBook()
    {
        $pengembalian = new TransaksiModel();

        $data['pengembalian'] = $pengembalian->getAllTransaction();
        return view('viewAdmin/dashboard_returned_book', $data);
    }

    public function updatePengembalian($idtransaksi, $idbuku, $tgl_pinjam)
    {
        $trans = new TransaksiModel();

        if((strtotime(date('Y-m-d'))-strtotime($tgl_pinjam))/86400 < 14){
            $trans->updateTransaction($idtransaksi, $idbuku);
        } else{
            $trans->updateTransactionFine($idtransaksi, $idbuku);
        }

        session()->setFlashdata('pesan', 'idbuku: ' .$idbuku);

        return redirect()->to(base_url('dashboard/borrowed_book'));
    }
}
