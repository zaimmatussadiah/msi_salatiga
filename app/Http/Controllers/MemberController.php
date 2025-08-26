<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    //
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required',
            'job' => 'required',
            'description' => 'nullable|string',
        ]);

        $image = $request->file('image');
        $image->storeAs('/public/members', $request->file('image')->hashName());

        Member::create([
            'name' => $request->name,
            'image' => $request->file('image')->hashName(),
            'job' => $request->job,
            'description' => $request->description,
        ]);

        return redirect()->route('members')->with('message', 'Data berhasil dimasukan');
    }

    public function edit($id)
    {
        $pengurus = Member::find($id);
        return view('admin.members.edit', compact('pengurus'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'job' => 'required',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('/public/members', $image->hashName());
            //delete old image
            Storage::delete('/public/members/' . $member->image);
            $member->update([
                'name' => $request->name,
                'image' => $request->file('image')->hashName(),
                'job' => $request->job,
                'description' => $request->description,
            ]);

        } else {
            $member->update([
                'name' => $request->name,
                'job' => $request->job,
                'description' => $request->description,
            ]);
        }
        return redirect()->route('members')->with('message', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $image = $member->image;
        $pathImage = '/public/members/' . $image;

        if (Storage::exists($pathImage)) {
            Storage::delete($pathImage);
        }
        $member->delete();

        return redirect()->route('members')->with('message', 'Data berhasil dihapus');
    }
}
