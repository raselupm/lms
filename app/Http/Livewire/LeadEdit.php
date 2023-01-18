<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\Note;
use Livewire\Component;

class LeadEdit extends Component
{
    public $lead_id;
    public $name;
    public $email;
    public $phone;

    public $note;

    public function mount() {
        $lead = Lead::findOrFail($this->lead_id);
        $this->lead_id = $lead->id;
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
    }

    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);

        return view('livewire.lead-edit', [
            'notes' => $lead->notes
        ]);
    }

    protected $rules = [
        'email' => 'email',
        'phone' => 'required',
    ];

    public function submitForm() {
        sleep(5);

        $lead = Lead::findOrFail($this->lead_id);

        $this->validate();

        $lead->name = $this->name;
        $lead->email = $this->email;
        $lead->phone = $this->phone;
        $lead->save();

        flash()->addSuccess('Lead updated successfully');
    }

    public function addNote() {
        $lead = Lead::findOrFail($this->lead_id);
        $note = new Note();
        $note->description = $this->note;
        $note->save();

        $lead->notes()->attach($note->id);

        $this->note = '';

        flash()->addSuccess('Note added successfully');
    }
    public function noteDelete($id) {
        
        $note = Note::findOrFail($id);
        $note->delete();

        flash()->addSuccess('Note deleted successfully');
        
    }
}
