db.createUser( { user: "admin",
    pwd: "p@ssw0rd",
    roles: [ "userAdminAnyDatabase" ] } )

db.createUser({
    user: "wai_web",
    pwd: "w@i_w3b",
    roles: [
        { role: "readWrite", db: "login" }
    ]
});
