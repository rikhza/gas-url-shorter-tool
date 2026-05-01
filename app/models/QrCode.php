<?php
/*
 *
 */

namespace Altum\Models;

class QrCode extends Model {

    public function delete($qr_code_id) {

        if(!$qr_code = db()->where('qr_code_id', $qr_code_id)->getOne('qr_codes', ['user_id', 'qr_code_id', 'qr_code', 'qr_code_logo'])) {
            return;
        }

        foreach(['qr_code', 'qr_code_logo'] as $image_key) {
            \Altum\Uploads::delete_uploaded_file($qr_code->{$image_key}, $image_key);
        }

        /* Delete from database */
        db()->where('qr_code_id', $qr_code_id)->delete('qr_codes');

        /* Clear the cache */
        \Altum\Cache::$adapter->deleteItem('qr_codes_total?user_id=' . $qr_code->user_id);
    }
}
