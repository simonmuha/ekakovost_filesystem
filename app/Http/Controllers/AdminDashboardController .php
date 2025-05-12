<?PHP

use App\Models\Entity;
use App\Models\Tag;
use App\Models\AcademicYear;

Route::view('/admin/dashboard', 'storage.admin_dashboard', [
    'entities' => \App\Models\Entity::all(),
    'tags' => \App\Models\Tag::all(),
    'years' => \App\Models\AcademicYear::orderBy('start_date', 'desc')->get(),
])->middleware('auth')->name('admin.dashboard');
