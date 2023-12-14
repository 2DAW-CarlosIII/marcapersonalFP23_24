<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getIndex() {
        return view('users.index',['arrayUsers'=>$this->arrayUsers]);
    }

    public function getShow($id) {
        return view('users.show')
            ->with('user', $this->arrayUsers[$id])
            ->with('id', $id);
    }

    public function putEdit($id) {
        return view('users.edit')
            ->with("user",$this->arrayUsers[$id])
            ->with("id",$id);
    }

    public function getEdit($id) {
        return view('users.edit')
            ->with("user",$this->arrayUsers[$id])
            ->with('id',$id);
    }

    public function getCreate() {
        return view('users.create');
    }


    private $arrayUsers = [
        [
            'id' => 1,
            'email' => 'user0@marcapersonalFP.es',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password0',
            'linkedin' => 'https://www.linkedin.com/in/user0',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 2,
            'email' => 'user1@marcapersonalFP.es',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'password' => 'password1',
            'linkedin' => 'https://www.linkedin.com/in/user1',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 3,
            'email' => 'user2@marcapersonalFP.es',
            'first_name' => 'Alice',
            'last_name' => 'Johnson',
            'password' => 'password2',
            'linkedin' => 'https://www.linkedin.com/in/user2',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 4,
            'email' => 'user3@marcapersonalFP.es',
            'first_name' => 'Bob',
            'last_name' => 'Williams',
            'password' => 'password3',
            'linkedin' => 'https://www.linkedin.com/in/user3',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 5,
            'email' => 'user4@marcapersonalFP.es',
            'first_name' => 'Eva',
            'last_name' => 'Brown',
            'password' => 'password4',
            'linkedin' => 'https://www.linkedin.com/in/user4',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 6,
            'email' => 'user5@marcapersonalFP.es',
            'first_name' => 'Michael',
            'last_name' => 'Taylor',
            'password' => 'password5',
            'linkedin' => 'https://www.linkedin.com/in/user5',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 7,
            'email' => 'user6@marcapersonalFP.es',
            'first_name' => 'Sophie',
            'last_name' => 'Miller',
            'password' => 'password6',
            'linkedin' => 'https://www.linkedin.com/in/user6',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 8,
            'email' => 'user7@marcapersonalFP.es',
            'first_name' => 'David',
            'last_name' => 'Davis',
            'password' => 'password7',
            'linkedin' => 'https://www.linkedin.com/in/user7',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 9,
            'email' => 'user8@marcapersonalFP.es',
            'first_name' => 'Emily',
            'last_name' => 'White',
            'password' => 'password8',
            'linkedin' => 'https://www.linkedin.com/in/user8',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
        [
            'id' => 10,
            'email' => 'user9@marcapersonalFP.es',
            'first_name' => 'Tom',
            'last_name' => 'Wilson',
            'password' => 'password9',
            'linkedin' => 'https://www.linkedin.com/in/user9',
            'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png'
        ],
    ];

}
