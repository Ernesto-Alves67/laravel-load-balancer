<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inbox\twoUsersHaveChattedBeforeRequest;
use App\Services\InboxService;
use Illuminate\Http\JsonResponse;

class InboxController extends Controller
{
    /**
     * The InboxService instance.
     */
    private InboxService $inboxService;

    /**
     * Create a new InboxService instance.
     */
    public function __construct(InboxService $inboxService)
    {
        $this->inboxService = $inboxService;
    }

    /**
     * Checks if two users have ever chatted.
     */
    public function twoUsersHaveChattedBefore(twoUsersHaveChattedBeforeRequest $request): JsonResponse
    {
        $validatedRequest = $request->validated();

        return $this->inboxService->twoUsersHaveChattedBefore($validatedRequest);
    }

    /**
     * Get all pairs from cafeteria.
     */
    public function allPairsFromCafeteria(int $userId): JsonResponse
    {
        return $this->inboxService->allPairsFromCafeteria($userId);
    }

    public function delete(int $userId, int $otherUserId): JsonResponse
    {
        return $this->inboxService->delete($userId, $otherUserId);
    }
}
