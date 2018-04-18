use mytest;

drop table kospenusersGlobal;

create table if not exists kospenusersGlobal as
(select updated_at, ic, name, state, region, subregion, locality
from kospenusersServer
where (state = 'PAHANG' and 
(region != 'MARAN' or 
subregion != 'JENGKA2' or 
locality != 'ULUJEMPOL')) or 
(state != 'PAHANG'));