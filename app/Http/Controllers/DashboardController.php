use App\Models\Licencia;
use Illuminate\Support\Facades\DB;

public function estadisticas()
{
    $datos = Licencia::select(
        DB::raw("MONTH(created_at) as mes"),
        DB::raw("COUNT(*) as total")
    )
    ->groupBy('mes')
    ->orderBy('mes')
    ->get();

    return response()->json($datos);
}