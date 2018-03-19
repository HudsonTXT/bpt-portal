<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('admin', User::class)) {
            return redirect('home');
        }
        $users = User::all();
        $users_sort = [];
        foreach ($users as $user) {

            $users_sort[] = [$user->id, $user->name, $user->email, ($user->isAdmin ? 'Администратор' : 'Пользователь'), ''];
        }

        return view('admin.index', ['grid' =>
            ['th' =>
                ['#', 'Имя', 'E-mail', 'Права', 'Редактирование'],
                'tr' =>
                    $users_sort,
                'edit' =>
                    ['edit' => true, 'delete' => true, 'model' => 'users']
            ]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $inputs = [
            'module' => 'users',
            'id' => $user->id,
            'fields' =>
                [
                    [
                        'type' => 'text',
                        'name' => 'name',
                        'value' => $user->name,
                        'label' => 'Имя пользователя:',
                        'placeholder' => 'Имя пользователя'
                    ],
                    [
                        'type' => 'text',
                        'name' => 'email',
                        'value' => $user->email,
                        'label' => 'E-mail:',
                        'placeholder' => 'E-mail'
                    ],
                    [
                        'type' => 'radio',
                        'label' => 'Администартор?',
                        'name' => 'isAdmin',
                        'value' => $user->isAdmin,
                        'fields' => [
                            [
                                'value' => '1',
                                'label' => 'Да '
                            ],
                            [
                                'value' => '0',
                                'label' => 'Нет '
                            ]

                        ],
                    ],
                    [
                        'type' => 'submit'
                    ]
                ]

        ];

        return view('admin.edit', ['inputs' => $inputs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->except(['_method', '_token']);
        $user = User::findOrFail($id);
        foreach ($inputs as $key => $value) {

            $user->$key = $value;
        }
        $user->save();


        return redirect('/admin/users')->with('status', 'Пользователь обновлен!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/users')->with('status', 'Пользователь удален!');
    }
}
