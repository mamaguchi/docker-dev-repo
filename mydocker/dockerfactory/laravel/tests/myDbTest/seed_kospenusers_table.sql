use homestead;

delete from kospenusers;

insert into kospenusers(ic,fk_gender,fk_state,fk_region,fk_subregion,fk_locality,name,address,firstRegRegion,created_at,updated_at,version) values
('888888105555',1,1,1,1,1,'monster','southernpark','klang','2018-02-11 09:17:27','2018-02-11 09:17:27',1), 
('888888106666',1,1,1,1,1,'mongola','southernpark','klang','2018-02-12 23:55:40','2018-02-12 23:55:40',2);