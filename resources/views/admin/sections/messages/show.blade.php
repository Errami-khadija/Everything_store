@extends('layouts.admin')
@section('page-title', 'Messages')
@section('page-subtitle', 'Manage your store messages')

@section('content')
    <!-- Message Details Section -->
    <div id="messageDetailsSection" class="p-6 fade-in ">
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
               <h3 class="text-lg font-semibold text-gray-800">Message Details</h3>
            </div>

            <div class="p-6">
                <div class="mb-4">
                    <h4 class="text-sm font-medium text-gray-700">Sender:</h4>
                    <p class="text-gray-900">{{ $message->name }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-sm font-medium text-gray-700">Email:</h4>
                    <p class="text-gray-900">{{ $message->email }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-sm font-medium text-gray-700">Subject:</h4>
                    <p class="text-gray-900">{{ $message->subject }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-sm font-medium text-gray-700">Message:</h4>
                    <p class="text-gray-900 whitespace-pre-line">{{ $message->message }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('admin.messages.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">Back to Messages</a>

                    <a
                        href="mailto:{{ $message->email }}?subject={{ urlencode('Re: ' . ($message->subject ?? 'Contact Message')) }}"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors"
                      >
                          <i class="fa-solid fa-reply"></i>
                          Reply
                      </a>

                      
                </div>

            </div>
        </div>
    </div>
@endsection
