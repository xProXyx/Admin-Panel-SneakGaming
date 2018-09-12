local ESX = nil

TriggerEvent('esx:getSharedObject', function(obj) ESX = obj end)

AddEventHandler('onMySQLReady', function()
	MySQL.Async.execute('UPDATE users SET online = 0  WHERE online = 1',{ },
	function (result)
		print('All users have been set to offline')
	end)
end)

ESX.RegisterServerCallback('esx_sneakstatus:Setonline', function(source)
	local _source  = source
	local xPlayer  = ESX.GetPlayerFromId(_source)
	local playerName = GetPlayerName(source)
	if xPlayer ~= nil then
		local identifier =  xPlayer.identifier
		MySQL.Async.execute('UPDATE users SET online = 1 WHERE identifier = @identifier',
		{
			['@identifier'] =  identifier
		},
		function (result)
		end)
	end
end)

AddEventHandler('playerDropped', function(reason)
	local pname = GetPlayerName(source)
	local _source  = source
	local xPlayer  = ESX.GetPlayerFromId(_source)

	if xPlayer ~= nil then
		local identifier =  xPlayer.identifier
		MySQL.Async.execute('UPDATE users SET online = 0 WHERE identifier = @identifier',
		{
			['@identifier'] =  identifier
		},
		function (result)
		end)
	end

end)
