@extends('layouts.admin_dashboard')

@section('title', 'Admin | RxPONT Dashboard')

@section('content')

<!-- Page Title & Breadcrumb -->
<div class="page-header-wrapper">
    <div class="page-title-box">
        <div class="page-title-icon">
            <i class="bi bi-house-door-fill"></i>
        </div>
        <h2 class="page-title-text">Dashboard</h2>
    </div>
    <div class="page-breadcrumb">
        <span>Overview</span>
        <i class="bi bi-info-circle text-primary"></i>
    </div>
</div>

<!-- =====================================================
     TOP 3 GRADIENT KPI CARDS
====================================================== -->
<div class="row g-4 mb-4">
    <!-- Card 1: Pink/Coral Gradient -->
    <div class="col-md-4">
        <div class="card-stat-gradient card-stat-pink">
            <div class="card-circle-bg"></div>
            <div class="card-stat-header">
                <h4 class="card-stat-title">Weekly Sales</h4>
                <i class="bi bi-graph-up-arrow card-stat-icon"></i>
            </div>
            <div class="card-stat-number">$ {{ number_format($displayTotal) }}</div>
            <p class="card-stat-trend">Increased by 60%</p>
        </div>
    </div>

    <!-- Card 2: Blue Gradient -->
    <div class="col-md-4">
        <div class="card-stat-gradient card-stat-blue">
            <div class="card-circle-bg"></div>
            <div class="card-stat-header">
                <h4 class="card-stat-title">Weekly Orders</h4>
                <i class="bi bi-bookmark-fill card-stat-icon"></i>
            </div>
            <div class="card-stat-number">{{ number_format($displayPending) }}</div>
            <p class="card-stat-trend">Decreased by 10%</p>
        </div>
    </div>

    <!-- Card 3: Teal Gradient -->
    <div class="col-md-4">
        <div class="card-stat-gradient card-stat-teal">
            <div class="card-circle-bg"></div>
            <div class="card-stat-header">
                <h4 class="card-stat-title">Visitors Online</h4>
                <i class="bi bi-gem card-stat-icon"></i>
            </div>
            <div class="card-stat-number">{{ number_format($displayApproved) }}</div>
            <p class="card-stat-trend">Increased by 5%</p>
        </div>
    </div>
</div>

<!-- =====================================================
     CHARTS ROW (BAR CHART & DONUT CHART)
====================================================== -->
<div class="row g-4 mb-4">
    <!-- Left Chart: Visit and Sales Statistics -->
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="card-header-flex">
                <h4 class="card-box-title">Visit And Sales Statistics</h4>
                <div class="chart-legend-pills">
                    <span><span class="legend-dot dot-purple"></span> CHN</span>
                    <span><span class="legend-dot dot-teal"></span> USA</span>
                    <span><span class="legend-dot dot-pink"></span> UK</span>
                </div>
            </div>
            <div style="height: 280px; position: relative;">
                <canvas id="salesBarChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Right Chart: Traffic Sources -->
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="card-header-flex">
                <h4 class="card-box-title">Traffic Sources</h4>
                <i class="bi bi-shield-shaded text-warning fs-5"></i>
            </div>
            <div style="height: 280px; position: relative;" class="d-flex align-items-center justify-content-center">
                <canvas id="trafficDonutChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- =====================================================
     RECENT PATIENT REGISTRATIONS TABLE
====================================================== -->
<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-header-flex">
                <div>
                    <h4 class="card-box-title">Recent Patient Enrollments</h4>
                    <span class="text-muted small">Latest registrations submitted via the portal</span>
                </div>
                <a href="{{ route('patient.register.form') }}" class="btn btn-sm btn-primary rounded-pill px-3" style="background-color: var(--purple-primary); border-color: var(--purple-primary);">
                    <i class="bi bi-plus-lg me-1"></i> New Patient
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Status</th>
                            <th>Registered Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPatients as $patient)
                            <tr>
                                <td>
                                    <div class="patient-avatar-box">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($patient->full_name) }}&background=da8cff&color=fff" alt="Avatar">
                                        <div>
                                            <div class="fw-bold">{{ $patient->full_name }}</div>
                                            <small class="text-muted">{{ $patient->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $patient->contact_number ?? 'N/A' }}</td>
                                <td>
                                    <span class="text-capitalize">{{ $patient->gender ?? 'N/A' }}</span>
                                </td>
                                <td>{{ $patient->date_of_birth ? \Carbon\Carbon::parse($patient->date_of_birth)->format('d M, Y') : 'N/A' }}</td>
                                <td>
                                    @if($patient->status == 1)
                                        <span class="status-badge status-approved">Approved</span>
                                    @elseif($patient->status == 0)
                                        <span class="status-badge status-pending">Pending</span>
                                    @else
                                        <span class="status-badge status-review">In Review</span>
                                    @endif
                                </td>
                                <td>{{ $patient->created_at->format('d M, Y') }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light border rounded-circle" title="View Details">
                                        <i class="bi bi-eye text-primary"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <!-- Baseline Preview Records Matching Theme -->
                            <tr>
                                <td>
                                    <div class="patient-avatar-box">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&h=80&q=80" alt="Avatar">
                                        <div>
                                            <div class="fw-bold">David Greymaax</div>
                                            <small class="text-muted">david.grey@example.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>+91 98765 43210</td>
                                <td>Male</td>
                                <td>15 Aug, 1988</td>
                                <td><span class="status-badge status-approved">Approved</span></td>
                                <td>Today</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light border rounded-circle"><i class="bi bi-eye text-primary"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="patient-avatar-box">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=80&h=80&q=80" alt="Avatar">
                                        <div>
                                            <div class="fw-bold">Stella Johnson</div>
                                            <small class="text-muted">stella.j@example.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>+91 98234 56789</td>
                                <td>Female</td>
                                <td>22 Mar, 1994</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>Yesterday</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light border rounded-circle"><i class="bi bi-eye text-primary"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="patient-avatar-box">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&h=80&q=80" alt="Avatar">
                                        <div>
                                            <div class="fw-bold">Marina Michel</div>
                                            <small class="text-muted">marina.m@example.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>+91 97123 45678</td>
                                <td>Female</td>
                                <td>10 Jan, 1991</td>
                                <td><span class="status-badge status-review">In Review</span></td>
                                <td>28 Aug, 2026</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-light border rounded-circle"><i class="bi bi-eye text-primary"></i></button>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Visit And Sales Statistics (Bar Chart)
        const ctxBar = document.getElementById('salesBarChart');
        if (ctxBar) {
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
                    datasets: [
                        {
                            label: 'CHN',
                            data: [20, 40, 15, 35, 25, 50, 30, 20],
                            backgroundColor: '#b66dff',
                            borderRadius: 4,
                            barThickness: 8,
                        },
                        {
                            label: 'USA',
                            data: [40, 30, 20, 10, 50, 40, 30, 55],
                            backgroundColor: '#1bcfb4',
                            borderRadius: 4,
                            barThickness: 8,
                        },
                        {
                            label: 'UK',
                            data: [30, 20, 40, 60, 30, 20, 40, 35],
                            backgroundColor: '#fe7096',
                            borderRadius: 4,
                            barThickness: 8,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            border: { display: false }
                        },
                        y: {
                            grid: { color: '#f0f0f0' },
                            border: { display: false },
                            ticks: { stepSize: 20 }
                        }
                    }
                }
            });
        }

        // 2. Traffic Sources (Donut Chart)
        const ctxDonut = document.getElementById('trafficDonutChart');
        if (ctxDonut) {
            new Chart(ctxDonut, {
                type: 'doughnut',
                data: {
                    labels: ['Direct Search', 'Referral Direct', 'Online Campaign'],
                    datasets: [{
                        data: [55, 30, 15],
                        backgroundColor: [
                            '#fe7096',
                            '#1bcfb4',
                            '#047edf'
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 16,
                                font: { size: 12 }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
