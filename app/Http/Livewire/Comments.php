<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $newComment;
    public $image;
    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|min:6|max:255',
        ]);
    }

    public function addComments()
    {
        $this->validate(['newComment' => 'required|min:6|max:255']);
        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        // $this->comments->prepend($createdComment);
        $this->newComment = "";
        session()->flash('success', 'Comment successfully added.');
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        // $this->comments = $this->comments->except($commentId);
        // $this->comments = $this->comments->where('id', '!=', $commentId);
        session()->flash('success', "Comment successfully deleted.");
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2)
        ]);
    }
}
