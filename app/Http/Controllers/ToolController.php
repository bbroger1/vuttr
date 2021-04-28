<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    protected $tool;

    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    public function index()
    {
        $tools = $this->tool->all();

        for ($i = 0; $i < count($tools); $i++) {
            $tools[$i]['tags'] = json_decode($tools[$i]['tags']);
        }

        return response()->json($tools);
    }

    public function show($id)
    {
        if (!$tools = $this->tool->find($id)) {
            return response()->json('Tool not found', 404);
        }

        $tools['tags'] = json_decode($tools['tags']);
        return response()->json($tools);
    }

    public function showTag($tag)
    {
        $tools = $this->tool->where('tags', 'LIKE', '%' . $tag . '%')->get();

        if (count($tools) == 0) {
            return response()->json('Tag not found', 404);
        }

        for ($i = 0; $i < count($tools); $i++) {
            $tools[$i]['tags'] = json_decode($tools[$i]['tags']);
        }

        return response()->json($tools);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'link' => 'required|unique:tools',
            'description' => 'required',
            'tags' => 'required'
        ]);

        $tool_all = $request->all();
        $tool_all['tags'] = json_encode($tool_all['tags']);
        try {
            $tool = $this->tool->create($tool_all);
            return response()->json($tool, 201);
        } catch (\Throwable $e) {
            return response()->json('Registration error ', 404);
        }
    }

    public function update($id, Request $request)
    {
        if (!$tool = $this->tool->find($id)) {
            return response()->json('Tool not found', 404);
        }

        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'link' => "required|unique:tools,link,{$id},id",
            'description' => 'required',
            'tags' => 'required'
        ]);

        $request['tags'] = json_encode($request['tags']);
        try {
            $tool->update($request->all());
            $tool['tags'] = json_decode($tool['tags']);
            return response()->json($tool, 200);
        } catch (\Throwable $e) {
            return response()->json('Registration error ', 404);
        }
    }

    public function delete($id)
    {
        if (!$tool = $this->tool->find($id)) {
            return response()->json('Tool not found', 404);
        }

        $tool->delete();
        return response()->json('No Content', 204);
    }
}
