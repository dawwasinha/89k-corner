<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
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
    
    .success-box {
      position: relative;
      overflow: hidden;
    }
    
    .success-box::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(to bottom, #10b981, #0ea5e9);
    }
    
    .payment-method-icon {
      filter: grayscale(0);
      opacity: 1;
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
    
    .glow {
      box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);
    }
    
    .pulse-green {
      animation: pulse-green 2s infinite;
    }
    
    @keyframes pulse-green {
      0% {
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
      }
      70% {
        box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
      }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 min-h-screen flex items-center justify-center p-4 text-gray-200">
  <div class="max-w-2xl w-full">
    <!-- Main Card -->
    <div class="overflow-hidden rounded-xl shadow-2xl bg-gradient-to-b from-slate-800 to-slate-900 border border-slate-700 glow">
      <!-- Header -->
      <div class="p-6 text-center border-b border-gray-700 bg-gradient-to-r from-slate-800 via-slate-700 to-slate-800">
        <div class="flex justify-center mb-4">
          <div class="h-16 w-16 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center shadow-lg pulse-green">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
        </div>
        <h1 class="text-2xl font-bold mb-1 bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 to-teal-400">Payment Successful</h1>
        <div class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-900/30 border border-emerald-700/50 mt-2">
          <span class="h-2 w-2 rounded-full bg-emerald-500 mr-2"></span>
          <span class="text-sm font-medium text-emerald-400">Transaction Complete</span>
        </div>
      </div>
      
      <!-- Success Message -->
      <div class="p-6 bg-slate-800/80 border-b border-gray-700">
        <div class="success-box bg-slate-700/30 rounded-lg p-5 relative">
          <h2 class="text-lg font-semibold mb-3 text-emerald-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Thank you for your payment
          </h2>
          
          <p class="text-gray-300 mb-4">
            We've successfully processed your payment for the recent invoice. Your subscription has been extended and all services are active. Thank you for your continued business.
          </p>
          
          <p class="text-gray-300">
            Your next billing date will be <span class="font-medium text-white">{{ $payment->due_date->addMonth()->format('F, Y') }}</span>. You can view your complete payment history and manage your subscription in your account dashboard.
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
              <p class="font-medium text-white">{{ $payment->invoice_code }}</p>
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
              <p class="font-medium text-emerald-400">Paid</p>
            </div>
          </div>
        </div>
        
        <!-- Order Summary -->
        <div class="mb-6">
          <h3 class="text-md font-semibold mb-3 flex items-center text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            Order Summary
          </h3>
          
          <div class="glass-effect rounded-lg overflow-hidden">
            <div class="p-4 border-b border-gray-700">
              <div class="flex justify-between items-center">
                <div>
                  <p class="font-medium text-white">Payment for rent: {{ $payment->room->name }}</p>
                  <p class="text-sm text-gray-400">{{ $payment->due_date->format('F, Y') }}</p>
                </div>
                <p class="font-medium text-white">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
              </div>
            </div>
            <div class="p-4 bg-slate-700/50">
              <div class="flex justify-between items-center">
                <p class="font-semibold text-white">Total</p>
                <p class="font-semibold text-white">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="p-4 text-center text-sm text-gray-400 bg-slate-900 border-t border-gray-800">
        <p>This is an automated receipt. Please do not reply to this email.</p>
        <div class="mt-2">
          <p>© 2025 Financial Services. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>