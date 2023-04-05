<?php

namespace Src\Entities\Account\Domains\Repositories;

use App\Models\Account as AccountEloquent;
use Illuminate\Support\Collection;
use Src\Entities\Account\Domains\Account;
use Src\Entities\Account\Domains\Contracts\AccountRepositoryContract;
use Src\Entities\Account\Domains\ObjectValues\Name;
use Src\Entities\Account\Domains\ObjectValues\Phone;

class EloquentAccountRepository implements AccountRepositoryContract
{
    public function newInstance()
    {
        return new AccountEloquent();
    }

    public function findById($id): Account
    {
        $eloquentModel = AccountEloquent::findOrFail($id);

        return new Account(
            $eloquentModel->id,
            new Name($eloquentModel->first_name),
            new Phone($eloquentModel->first_name),
        );
    }

    public function findAll(): Collection
    {
        $collection = AccountEloquent::all();

        return $collection->map(function ($item) {
            return new Account(
                $item->id,
                new Name($item->name),
                new Phone($item->phone),
            );
        });
    }

    public function save(Account $account): void
    {
        $data = [
            'name' => $account->name()->value(),
            'phone' => $account->phone()->value(),
        ];

        $this->newInstance()->fill($data)->save();
    }

    public function update($id, $data): void
    {
        $data = [
            'name' => $data['name'],
            'phone' => $data['phone'],
        ];
        AccountEloquent::findOrFail($id)->update($data);
    }

    public function delete($id): void
    {
        AccountEloquent::findOrFail($id)->delete();
    }
}
