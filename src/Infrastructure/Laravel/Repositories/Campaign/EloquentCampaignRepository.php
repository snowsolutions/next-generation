<?php

namespace Src\Application\Lead\Domains\Repositories;

use App\Models\Lead as LeadEloquent;
use Illuminate\Support\Collection;
use Src\Application\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Application\Lead\Domains\Lead;
use Src\Application\Lead\Domains\ObjectValues\Company;
use Src\Application\Lead\Domains\ObjectValues\Email;
use Src\Application\Lead\Domains\ObjectValues\FirstName;
use Src\Application\Lead\Domains\ObjectValues\LastName;
use Src\Application\Lead\Domains\ObjectValues\Phone;

class EloquentLeadRepository implements LeadRepositoryContract
{
    public function newInstance()
    {
        return new LeadEloquent();
    }

    public function findById($id): Lead
    {
        $eloquentModel = LeadEloquent::findOrFail($id);

        return new Lead(
            $eloquentModel->id,
            new FirstName($eloquentModel->first_name),
            new LastName($eloquentModel->first_name),
            new Email($eloquentModel->first_name),
            new Company($eloquentModel->first_name),
            new Phone($eloquentModel->first_name),
        );
    }

    public function findAll(): Collection
    {
        $collection = LeadEloquent::all();

        return $collection->map(function ($item) {
            return new Lead(
                $item->id,
                new FirstName($item->first_name),
                new LastName($item->first_name),
                new Email($item->first_name),
                new Company($item->first_name),
                new Phone($item->first_name),
            );
        });
    }

    public function save(Lead $lead): void
    {
        $data = [
            'first_name' => $lead->firstName()->value(),
            'last_name' => $lead->lastName()->value(),
            'email' => $lead->email()->value(),
            'company' => $lead->company()->value(),
            'phone' => $lead->phone()->value(),
        ];

        $this->newInstance()->fill($data)->save();
    }

    public function update($id, $data): void
    {
        $data = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'company' => $data['company'],
            'phone' => $data['phone'],
        ];
        LeadEloquent::findOrFail($id)->update($data);
    }

    public function delete($id): void
    {
        LeadEloquent::findOrFail($id)->delete();
    }
}
