<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru - Sistem Manajemen Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.95);
        }
        .card-header {
            background: linear-gradient(45deg, #f093fb, #f5576c);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            padding: 25px;
        }
        .form-control, .form-select {
            border-radius: 15px;
            border: 2px solid #e9ecef;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #f093fb;
            box-shadow: 0 0 0 0.2rem rgba(240, 147, 251, 0.25);
        }
        .btn-warning {
            background: linear-gradient(45deg, #f093fb, #f5576c);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
        }
        .btn-secondary {
            background: linear-gradient(45deg, #6c757d, #495057);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .input-group-text {
            background: linear-gradient(45deg, #f093fb, #f5576c);
            border: none;
            color: white;
            border-radius: 15px 0 0 15px;
        }
        .floating-card {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .hero-section {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
        }
        .user-info-card {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Hero Section -->
        <div class="hero-section">
            <h1 class="display-5 text-white mb-3">
                <i class="fas fa-user-edit me-3"></i>
                Edit Data Guru
            </h1>
            <p class="lead text-white-50">Perbarui informasi guru yang dipilih</p>
        </div>

        <!-- User Info Card -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <div class="user-info-card">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg bg-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-user text-primary fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">{{ $guru->nama }}</h4>
                            <p class="mb-0 opacity-75">
                                <i class="fas fa-id-card me-2"></i>{{ $guru->nip }} | 
                                <i class="fas fa-book me-2"></i>{{ $guru->mapel }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card floating-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">
                                <i class="fas fa-edit me-2"></i>
                                Form Edit Guru
                            </h3>
                            <a href="{{ route('guru.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Oops!</strong> Ada beberapa kesalahan dalam input Anda:
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">
                                        <i class="fas fa-user me-2"></i>Nama Lengkap
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                               id="nama" name="nama" value="{{ old('nama', $guru->nama) }}" 
                                               placeholder="Masukkan nama lengkap guru">
                                    </div>
                                    @error('nama')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nip" class="form-label">
                                        <i class="fas fa-id-card me-2"></i>NIP
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                               id="nip" name="nip" value="{{ old('nip', $guru->nip) }}" 
                                               placeholder="Masukkan NIP guru">
                                    </div>
                                    @error('nip')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mapel" class="form-label">
                                        <i class="fas fa-book me-2"></i>Mata Pelajaran
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        <select class="form-select @error('mapel') is-invalid @enderror" 
                                                id="mapel" name="mapel">
                                            <option value="">Pilih mata pelajaran</option>
                                            <option value="Matematika" {{ old('mapel', $guru->mapel) == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                            <option value="Bahasa Indonesia" {{ old('mapel', $guru->mapel) == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                            <option value="Bahasa Inggris" {{ old('mapel', $guru->mapel) == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                                            <option value="IPA" {{ old('mapel', $guru->mapel) == 'IPA' ? 'selected' : '' }}>IPA</option>
                                            <option value="IPS" {{ old('mapel', $guru->mapel) == 'IPS' ? 'selected' : '' }}>IPS</option>
                                            <option value="Pendidikan Agama" {{ old('mapel', $guru->mapel) == 'Pendidikan Agama' ? 'selected' : '' }}>Pendidikan Agama</option>
                                            <option value="PPKN" {{ old('mapel', $guru->mapel) == 'PPKN' ? 'selected' : '' }}>PPKN</option>
                                            <option value="Seni Budaya" {{ old('mapel', $guru->mapel) == 'Seni Budaya' ? 'selected' : '' }}>Seni Budaya</option>
                                            <option value="Penjaskes" {{ old('mapel', $guru->mapel) == 'Penjaskes' ? 'selected' : '' }}>Penjaskes</option>
                                            <option value="Informatika" {{ old('mapel', $guru->mapel) == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                                        </select>
                                    </div>
                                    @error('mapel')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nomor_hp" class="form-label">
                                        <i class="fas fa-phone me-2"></i>Nomor HP
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" 
                                               id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $guru->nomor_hp) }}" 
                                               placeholder="Contoh: 08123456789">
                                    </div>
                                    @error('nomor_hp')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="form-label">
                                    <i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                              id="alamat" name="alamat" rows="4" 
                                              placeholder="Masukkan alamat lengkap guru">{{ old('alamat', $guru->alamat) }}</textarea>
                                </div>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save me-2"></i>
                                    Update Data Guru
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
