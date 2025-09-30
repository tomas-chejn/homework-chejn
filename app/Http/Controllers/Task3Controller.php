<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Task3Controller extends Controller
{
    public function taskA(Request $request): View
    {
        $id = $request->input('id');
        $subordinates = !$id ? [] : $this->getAllSubordinates($id);

        return view('task3a', [
            'subordinates' => $subordinates
        ]);
    }

    public function taskB(Request $request): View
    {
        $id = $request->input('id');
        $superiors = !$id ? [] : $this->getSuperiors($id);

        return view('task3b', [
            'superiors' => $superiors
        ]);
    }

    public function getAllSubordinates(int $id): array
    {
        $team = $this->getTeam();
        $subordinates = [];
        $currentSet = [$id];

        while (!empty($currentSet)) {
            $nextSet = [];

            foreach ($currentSet as $currentId) {
                foreach ($team as $member) {
                    if ($member['id'] === $currentId) {
                        foreach ($member['subordinates'] as $subId) {
                            $subordinates[] = $this->getMemberById($subId);
                            $nextSet[] = $subId;
                        }
                        break;
                    }
                }
            }

            $currentSet = $nextSet;
        }

        return $subordinates;
    }

    private function getMemberById(int $id): array
    {
        $team = $this->getTeam();
        foreach ($team as $member) {
            if ($member['id'] === $id) {
                return $member;
            }
        }
        return [];
    }

    private function getSuperiors(int $id): array
    {
        $team = $this->getTeam();
        $superiors = [];
        $currentMemberId = $id;

        while (true) {
            $found = false;

            foreach ($team as $member) {
                if (in_array($currentMemberId, $member['subordinates'])) {
                    $superiors[] = $member;
                    $currentMemberId = $member['id'];
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                break;
            }
        }

        return $superiors;
    }

    private function getTeam(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Jean Luc Pickard',
                'subordinates' => [2, 3, 4]
            ],
            [
                'id' => 2,
                'name' => 'William Riker',
                'subordinates' => [5, 6, 7]
            ],
            [
                'id' => 3,
                'name' => 'Deana Troi',
                'subordinates' => [8, 9]
            ],
            [
                'id' => 4,
                'name' => 'Jordi La Forge',
                'subordinates' => [10, 11]
            ],
            [
                'id' => 5,
                'name' => 'Worf son of Mog',
                'subordinates' => [12, 13]
            ],
            [
                'id' => 6,
                'name' => 'Guinan',
                'subordinates' => []
            ],
            [
                'id' => 7,
                'name' => 'Beverly Crusher',
                'subordinates' => [14, 15]
            ],
            [
                'id' => 8,
                'name' => 'Lwaxana Troi',
                'subordinates' => []
            ],
            [
                'id' => 9,
                'name' => 'Reginald Barkley',
                'subordinates' => []
            ],
            [
                'id' => 10,
                'name' => 'Mr. Data',
                'subordinates' => []
            ],
            [
                'id' => 11,
                'name' => 'Miles O\'Brien',
                'subordinates' => []
            ],
            [
                'id' => 12,
                'name' => 'Tasha Yar',
                'subordinates' => []
            ],
            [
                'id' => 13,
                'name' => 'L\'Ehleyr',
                'subordinates' => [16]
            ],
            [
                'id' => 14,
                'name' => 'Weslley Crusher',
                'subordinates' => []
            ],
            [
                'id' => 15,
                'name' => 'Alyssa Ogawa',
                'subordinates' => [17]
            ],
            [
                'id' => 16,
                'name' => 'Alexander Rozhenko',
                'subordinates' => []
            ],
            [
                'id' => 17,
                'name' => 'Julian Bashir',
                'subordinates' => []
            ]
        ];
    }
}
