<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Invoice') }}
            </h2>

            <a class="lms-btn" href="{{ route('invoice-index') }}">back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:invoice-edit :invoice_id="$invoice->id" />

                    @if($invoice->amount()['due'] > 0)
                    <h2 class="font-bold mb-2">Add a payment</h2>
                    <div class="space-x-2 mb-2">
                        <button id="card" class="bg-black text-white font-semibold p-2 rounded-lg">Pay by Card</button>
                        <button id="cash" class="underline font-semibold">Pay by Cash</button>
                    </div>
                    <form id="stripeForm" method="post" action="{{route('stripe-payment')}}"> @csrf
                        <div class="flex mb-4">
                            <div class="w-full">
                                <input value="4242424242424242" name="card_no" type="number" class="lms-input"
                                    placeholder="Card number">
                            </div>
                            <div class="min-w-max ml-4">
                                <input value="12/30" name="card_expiry_date" type="text" class="lms-input"
                                    placeholder="Expiry month/year">
                            </div>
                            <div class="min-w-max ml-4">
                                <input value="232" name="card_ccv" type="text" class="lms-input" placeholder="CCV">
                            </div>
                            <div class="min-w-max ml-4">
                                <input name="amount" type="number" class="lms-input"
                                    value="{{number_format($invoice->amount()['due'], 2)}}" placeholder="Amount">
                            </div>
                            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                        </div>
                        <button type="submit" class="lms-btn">Pay Now</button>
                    </form>
                    <form id="cashForm" action="{{ route('cash-payment') }}" method="POST">
                        @csrf
                        <input type="number" name="amount" value="{{number_format($invoice->amount()['due'], 2)}}"
                            placeholder="Type Amount" class="lms-input">
                        <input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
                        <input type="submit" value="Pay Now" class="lms-btn mt-4">
                    </form>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('cashForm').style.display = 'none';
        document.getElementById('stripeForm').style.display = 'none';
        document.getElementById('card').addEventListener('click', function() {
            document.getElementById('stripeForm').style.display = 'block';
            document.getElementById('cashForm').style.display = 'none';
        });
        document.getElementById('cash').addEventListener('click', function() {
            document.getElementById('stripeForm').style.display = 'none';
            document.getElementById('cashForm').style.display = 'block';
        });
    </script>
</x-app-layout>