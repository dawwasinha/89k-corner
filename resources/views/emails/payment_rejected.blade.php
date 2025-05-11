<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Rejected</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f5f5f7;
    }
    
    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .alert-box {
      position: relative;
      overflow: hidden;
    }
    
    .alert-box::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(to bottom, #f43f5e, #ec4899);
    }
    
    .payment-method-icon {
      filter: grayscale(1);
      opacity: 0.7;
    }
    
    .shimmer {
      background: linear-gradient(
        to right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.1) 50%,
        rgba(255, 255, 255, 0) 100%
      );
      background-size: 200% 100%;
      animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
      0% {
        background-position: -100% 0;
      }
      100% {
        background-position: 100% 0;
      }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 min-h-screen flex items-center justify-center p-4 text-gray-200">
  <div class="max-w-2xl w-full">
    <!-- Main Card -->
    <div class="overflow-hidden rounded-xl shadow-2xl bg-gradient-to-b from-slate-800 to-slate-900 border border-slate-700">
      <!-- Header -->
      <div class="p-6 text-center border-b border-gray-700 bg-gradient-to-r from-slate-800 via-slate-700 to-slate-800">
        <div class="flex justify-center mb-4">
          <div class="h-16 w-16 rounded-full bg-gradient-to-r from-rose-500 to-pink-500 flex items-center justify-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
        <h1 class="text-2xl font-bold mb-1 bg-clip-text text-transparent bg-gradient-to-r from-rose-400 to-pink-400">Payment Rejected</h1>
        <div class="inline-flex items-center px-3 py-1 rounded-full bg-rose-900/30 border border-rose-700/50 mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
          <span class="text-sm font-medium text-rose-400">Action Required</span>
        </div>
      </div>
      
      <!-- Alert Message -->
      <div class="p-6 bg-slate-800/80 border-b border-gray-700">
        <div class="alert-box bg-slate-700/30 rounded-lg p-5 relative">
          <h2 class="text-lg font-semibold mb-3 text-rose-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            We couldn't process your payment
          </h2>
          
          <p class="text-gray-300 mb-4">
            {{ $payment->feedback }}
          </p>
        </div>
      </div>
      
      <!-- Payment Details -->
      <div class="p-6 bg-slate-800/50">
        <h2 class="text-lg font-semibold mb-4 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          Payment Details
        </h2>
        
        <!-- Invoice Info -->
        <div class="glass-effect rounded-lg overflow-hidden mb-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
            <div class="p-4 border-b md:border-b-0 md:border-r border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Invoice Number</p>
              <p class="font-medium text-white">{{  $payment->invoice_code }}</p>
            </div>
            <div class="p-4 border-b border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Date</p>
              <p class="font-medium text-white">{{  $payment->created_at->format('F d, Y') }}</p>
            </div>
            <div class="p-4 border-b md:border-b-0 md:border-r border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Amount</p>
              <p class="font-medium text-white">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
            </div>
            <div class="p-4">
              <p class="text-gray-400 text-sm mb-1">Status</p>
              <p class="font-medium text-rose-400">{{  $payment->status }}</p>
            </div>
          </div>
        </div>
        
        <!-- What to do next -->
        <div class="mb-6">
          <h3 class="text-md font-semibold mb-3 flex items-center text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            What to do next
          </h3>
          
          <div class="space-y-3">
            <div class="flex items-start">
              <div class="h-6 w-6 rounded-full bg-slate-700 flex items-center justify-center mr-3 flex-shrink-0">
                <span class="text-sm font-medium text-gray-300">1</span>
              </div>
              <p class="text-gray-300">Check your photo proof.</p>
            </div>
            <div class="flex items-start">
              <div class="h-6 w-6 rounded-full bg-slate-700 flex items-center justify-center mr-3 flex-shrink-0">
                <span class="text-sm font-medium text-gray-300">2</span>
              </div>
              <p class="text-gray-300">Check your new payment details and try again.</p>
            </div>
            <div class="flex items-start">
              <div class="h-6 w-6 rounded-full bg-slate-700 flex items-center justify-center mr-3 flex-shrink-0">
                <span class="text-sm font-medium text-gray-300">3</span>
              </div>
              <p class="text-gray-300">Contact our support team if the issue persists or if you need assistance.</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="p-4 text-center text-sm text-gray-400 bg-slate-900 border-t border-gray-800">
        <p>This is an automated notification. Please do not reply to this email.</p>
        <div class="mt-2">
          <p>© 2025 Financial Services. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>