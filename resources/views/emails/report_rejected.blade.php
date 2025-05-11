<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Rejected</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f5f5f7;
    }
    
    .status-badge {
      position: relative;
      overflow: hidden;
    }
    
    .status-badge::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.3));
      z-index: 1;
    }
    
    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .feedback-box {
      position: relative;
      overflow: hidden;
    }
    
    .feedback-box::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(to bottom, #f43f5e, #ec4899);
    }
    
    .quote-mark {
      position: absolute;
      top: 10px;
      right: 10px;
      opacity: 0.1;
      font-size: 60px;
      line-height: 1;
      font-family: serif;
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
          <div class="h-16 w-16 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 flex items-center justify-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
        <h1 class="text-2xl font-bold mb-1 bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-rose-400">Report Rejected</h1>
        <div class="inline-flex items-center px-3 py-1 rounded-full bg-rose-900/30 border border-rose-700/50 mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="text-sm font-medium text-rose-400">Action Required</span>
        </div>
      </div>
      
      <!-- Report Details -->
      <div class="p-6 bg-slate-800/50">
        <!-- Status Badge -->
        <div class="mb-6 flex justify-between items-center">
          <div class="status-badge px-4 py-2 rounded-lg bg-rose-600/20 border border-rose-500/30 text-rose-400 font-medium text-sm uppercase tracking-wider">
            Status: {{ ucfirst($report['status']) }}
          </div>
        </div>
        
        <!-- Report Info -->
        <div class="glass-effect rounded-lg overflow-hidden mb-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
            <div class="p-4 border-b md:border-b-0 md:border-r border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Reported by</p>
              <p class="font-medium text-white">{{ $report->user->name }}</p>
            </div>
            <div class="p-4 border-b border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Room name</p>
              <p class="font-medium text-white">{{ $report->room->name }}</p>
            </div>
            <div class="p-4 border-b md:border-b-0 md:border-r border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Created at</p>
              <p class="font-medium text-white">{{ \Carbon\Carbon::parse($report['created_at'])->format('d F Y, H:i') }}
</p>
            </div>
            <div class="p-4">
              <p class="text-gray-400 text-sm mb-1">Rejected at</p>
              <p class="font-medium text-white">{{ \Carbon\Carbon::parse($report['updated_at'])->format('d F Y, H:i') }}
</p>
            </div>
          </div>
        </div>
        
        <!-- Issue Details -->
        <div class="mb-6">
          <h2 class="text-lg font-semibold mb-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Issue Details
          </h2>
          
          <div class="glass-effect rounded-lg overflow-hidden">
            <div class="p-4 border-b border-gray-700">
              <p class="text-gray-400 text-sm mb-1">Title</p>
              <p class="font-medium text-white">{{ $report['title'] }}</p>
            </div>
            <div class="p-4">
              <p class="text-gray-400 text-sm mb-1">Description</p>
              <p class="font-medium text-white">{{ $report['description'] }}</p>
            </div>
          </div>
        </div>
        
        <!-- Feedback -->
        <div class="feedback-box bg-slate-700/30 rounded-lg p-5 relative">
          <div class="quote-mark">"</div>
          <p class="text-rose-200 italic mb-4">
            {{ $report['feedback'] }}
          </p>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="p-4 text-center text-sm text-gray-400 bg-slate-900 border-t border-gray-800">
        <p>This is an automated notification. Please do not reply to this email.</p>
        <div class="mt-2">
          <p>© 2025 Facility Management System. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>