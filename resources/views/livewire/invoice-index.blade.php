<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{$invoice->id}}</td>
                <td class="border px-4 py-2">{{$invoice->user->name}}</td>
                <td class="border px-4 py-2">{{date('F j, Y', strtotime($invoice->due_date))}}</td>
                <td class="border px-4 py-2 text-center">${{$invoice->amount()['total']}}</td>
                <td class="border px-4 py-2 text-center">${{$invoice->amount()['paid']}}</td>
                <td class="border px-4 py-2 text-center">${{$invoice->amount()['due']}}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="mr-1" href="">
                            @include('components.icons.edit')
                        </a>

                        <a class="mr-1" href="{{route('invoice-show', $invoice->id)}}">
                            @include('components.icons.eye')
                        </a>

                        <form class="ml-1" onsubmit="return confirm('Are you sure?');" wire:submit.prevent="invoiceDelete({{$invoice->id}})">
                            <button type="submit">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
