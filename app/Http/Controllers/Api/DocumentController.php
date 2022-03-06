<?php

namespace App\Http\Controllers\Api;

use App\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Создания документа
     *
     * @return JsonResponse
     */
    public function createDocument(): JsonResponse
    {
        $document = new Document();
        $document->status = 'draft';
        $document->payload = [];
        $document->save();

        return response()->json([
            'document' => $document
        ], 201);
    }

    /**
     * Получаем документ по uuid
     *
     * @param $uuid
     * @return JsonResponse
     */
    public function getDocument($uuid): JsonResponse
    {
        $document = Document::query()->getId($uuid);

        return response()->json($document);
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return JsonResponse
     */
    public function updateDocument(Request $request, $uuid): JsonResponse
    {
        $errors = Validator::make($request->all(),[
            'payload' => 'required|json'
        ]);
        if (!empty($errors->errors())){
            return response()->json($errors->errors(), 400);
        }

        /** @var Document $document */
        $document = Document::query()->getId($uuid);
        if ($document->status === 'draft') {
            $document->payload = $request->get('payload');
            $document->save();
        }
        return response()->json($document, 200);
    }

    /**
     * Публикуем документ
     *
     * @param string $uuid
     * @return JsonResponse
     */
    public function publishDocument(string $uuid): JsonResponse
    {
        /** @var Document $document */
        $document = Document::query()->getId($uuid);
        $document->status = 'published';
        $document->save();

        return response()->json($document, 200);
    }

    /**
     * Получаем данные с помощью pagination
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getPaginate(Request $request): JsonResponse
    {
        if (is_numeric($request->get('perPage')) && is_numeric($request->get('page'))) {
            $documents = Document::query()->simplePaginate($request->get('perPage'))->appends($request->get('page'));
        } else {
            return response()->json([], 400);
        }

        return response()->json($documents);
    }
}
