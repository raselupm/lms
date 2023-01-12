<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Livewire\Component;

class InvoiceShow extends Component
{
    public $selectedCourseId;

    public function render()
    {
        $invoice = Invoice::where('id', $this->selectedCourseId)->with('user')->first();
        $invoiceItem = InvoiceItem::where('id', $this->selectedCourseId)->first();

        return view('livewire.invoice-show', [
            'invoice' => $invoice,
            'invoiceItem' => $invoiceItem,
        ]);
    }
}
