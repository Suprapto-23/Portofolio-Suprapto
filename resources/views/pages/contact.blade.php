@extends('layouts.app')

@section('content')
<section class="bg-[#FAFCFF] pt-24 pb-24 lg:pt-32 relative">
    <div class="max-w-[1180px] mx-auto px-6">
        
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-[36px] md:text-[48px] font-extrabold text-[#0B1B3A] leading-tight mb-4">
                Let's Build Something <span class="bg-gradient-to-r from-[#0A6CFF] to-[#7048FF] text-transparent bg-clip-text">Great</span>
            </h1>
            <p class="text-[16px] text-[#64748B] max-w-[600px] mx-auto">
                Whether you have a question, a project proposal, or just want to say hi, my inbox is always open.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            
            <!-- Contact Information -->
            <div class="lg:col-span-5 flex flex-col gap-6" data-aos="fade-right">
                <div class="bg-white p-8 rounded-[24px] border border-[#DCE7F5] shadow-sm">
                    <h3 class="text-[20px] font-bold text-[#0B1B3A] mb-6">Contact Information</h3>
                    
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-[#EAF6FF] text-[#1677FF] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-[#64748B] uppercase tracking-wider mb-1">Email</p>
                            <a href="mailto:ssuprapto351@gmail.com" class="text-[15px] font-medium text-[#0B1B3A] hover:text-[#1677FF] transition-colors">ssuprapto351@gmail.com</a>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-[#EAF6FF] text-[#1677FF] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-[#64748B] uppercase tracking-wider mb-1">Location</p>
                            <p class="text-[15px] font-medium text-[#0B1B3A]">Kajen, Jawa Tengah, Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-[#EAF6FF] text-[#1677FF] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-[#64748B] uppercase tracking-wider mb-1">GitHub Profile</p>
                            <a href="https://github.com/Suprapto-23" target="_blank" class="text-[15px] font-medium text-[#0B1B3A] hover:text-[#1677FF] transition-colors">github.com/Suprapto-23</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form UI -->
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="bg-white p-8 lg:p-10 rounded-[24px] border border-[#DCE7F5] shadow-[0_15px_40px_-15px_rgba(22,119,255,0.1)]">
                    <form action="#" method="POST" class="flex flex-col gap-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label class="text-[14px] font-semibold text-[#0B1B3A]">Full Name</label>
                                <input type="text" placeholder="John Doe" class="w-full px-4 py-3 rounded-xl border border-[#DCE7F5] bg-[#FAFCFF] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1677FF]/20 focus:border-[#1677FF] transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-[14px] font-semibold text-[#0B1B3A]">Email Address</label>
                                <input type="email" placeholder="john@example.com" class="w-full px-4 py-3 rounded-xl border border-[#DCE7F5] bg-[#FAFCFF] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1677FF]/20 focus:border-[#1677FF] transition-all">
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[14px] font-semibold text-[#0B1B3A]">Subject</label>
                            <input type="text" placeholder="Project Inquiry" class="w-full px-4 py-3 rounded-xl border border-[#DCE7F5] bg-[#FAFCFF] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1677FF]/20 focus:border-[#1677FF] transition-all">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[14px] font-semibold text-[#0B1B3A]">Message</label>
                            <textarea rows="5" placeholder="Tell me about your project..." class="w-full px-4 py-3 rounded-xl border border-[#DCE7F5] bg-[#FAFCFF] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1677FF]/20 focus:border-[#1677FF] transition-all resize-none"></textarea>
                        </div>
                        <button type="button" class="mt-2 w-full h-[52px] flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#063B91] to-[#1677FF] text-white font-bold text-[15px] shadow-lg shadow-blue-500/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            Send Message
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection