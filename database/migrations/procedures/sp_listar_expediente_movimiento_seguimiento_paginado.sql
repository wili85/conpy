CREATE OR REPLACE FUNCTION public.sp_listar_expediente_movimiento_seguimiento_paginado(p_id_mov_expediente character varying, p_pagina character varying, p_limit character varying, p_ref refcursor)
 RETURNS refcursor
 LANGUAGE plpgsql
AS $function$

Declare
--v_id numeric;
--v_numinf character varying;
v_scad varchar;
v_campos varchar;
v_tabla varchar;
v_where varchar;
v_count varchar;
v_col_count varchar;
--v_perfil varchar;

Begin

	p_pagina=(p_pagina::Integer-1)*p_limit::Integer;
	
	v_campos='s.id,to_char(s.fecha_seguimiento,''dd-mm-yyyy'')fecha_seguimiento,tm.denominacion estado_seg,s."Observacion",
			to_char(s.fecha_proximo_seguimiento,''dd-mm-yyyy'')fecha_proximo_seguimiento ';

	v_tabla='from seguimientos s 
inner join tabla_maestras tm on tm.codigo=s.estado_proceso and tm.tipo=''EST_SEG'' ';
	
	v_where = ' Where 1=1  ';
	
	If p_id_mov_expediente<>'' Then
	 v_where:=v_where||'And s.id_mov_expediente = '''||p_id_mov_expediente||''' ';
	End If;
	
	EXECUTE ('SELECT count(1) '||v_tabla||v_where) INTO v_count;
	v_col_count:=' ,'||v_count||' as TotalRows ';

	If v_count::Integer > p_limit::Integer then
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By s.id Desc LIMIT '||p_limit||' OFFSET '||p_pagina||';'; 
	else
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By s.id Desc;'; 
	End If;
	
	--Raise Notice '%',v_scad;
	Open p_ref For Execute(v_scad);
	Return p_ref;
End

$function$
;

