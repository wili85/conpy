CREATE OR REPLACE FUNCTION public.sp_listar_expediente_litigante_paginado(p_id_expediente character varying, p_pagina character varying, p_limit character varying, p_ref refcursor)
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
	
	v_campos='l.id,tm.denominacion tipo_litigante,
case 
	when l.id_persona>0 then p.documento 
	else e.ruc 
end numero_documento,
case 
	when l.id_persona>0 then p.a_paterno||'' ''||p.a_materno||'' ''||p.nombres
	else e.nombre
end litigante,tm2.denominacion estado_lit ';

	v_tabla='from litigantes l 
inner join tabla_maestras tm on tm.codigo=l.id_tipo_litigante::varchar and tm.tipo=''TIPO_LIT''
left join personas p on l.id_persona=p.id  
left join empresas e on l.id_empresa=e.id 
inner join tabla_maestras tm2 on tm2.codigo=l.estado_lit and tm2.tipo=''EST_LIT'' ';
	
	v_where = ' Where 1=1  ';
	
	If p_id_expediente<>'' Then
	 v_where:=v_where||'And l.id_expediente = '''||p_id_expediente||''' ';
	End If;
	
	EXECUTE ('SELECT count(1) '||v_tabla||v_where) INTO v_count;
	v_col_count:=' ,'||v_count||' as TotalRows ';

	If v_count::Integer > p_limit::Integer then
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By l.id Desc LIMIT '||p_limit||' OFFSET '||p_pagina||';'; 
	else
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By l.id Desc;'; 
	End If;
	
	--Raise Notice '%',v_scad;
	Open p_ref For Execute(v_scad);
	Return p_ref;
End

$function$
;


