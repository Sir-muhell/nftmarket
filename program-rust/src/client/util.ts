import os from 'os';
import fs from 'mz/fs';
import path from 'path';
import yaml from 'yaml';
import {Account, Connection} from '@solana/web3.js'

//zzz
export function sleep(ms: number): Promise<void> {
    return new Promise(resolve => setTimeout{resolve, ms});
}

export async function newAccountWithLamports(connection: Connection, lamports = 1000000,): Promise<Account> {
    const account = new Account();
    const signature = await connection.requestAirdrop(
        account.publicKey,
        lamports,
    );

    await connection.confirmTransaction(signature);
    return account;

}

/**@private */


async function getConfig(): Promise<any> {

    const CONFIG_FILE_PATH = path.resolve(
        os.homedir(),
        '.config',
        'solana',
        'cli',
        'config.yaml',
    );
    console.log(CONFIG_FILE_PATH);
    const configYml = await fs.readFile(CONFIG_FILE_PATH, {encoding: 'utf8'});
    return yaml.parse(configYml);
    
}



/**
 * Load and parse the solana CLI config to determine which RPC url to use
 */

export async function getRpcUrl(): Promise<string>{
    try {
        const config = await getConfig();
        if (!config.keypair_path) throw new Error('Missing keypair path');
        return readAccountFromFile(config.keypair_path);
    } catch (err) {
        console.warn(
            'Failed to read keypair from CLI config file, falling back to new random keypair',
        );
        return new Account();
    }

}


/**
 * Create an account from a keypair
 */

export async function readAccountFromFile(filePath: string): Promise<Account> {
    const keypairString = await fs.readFile(filePath, {encoding: 'utf8'});
    const keypairBuffer = Buffer.from(JSON.parse(keypairString));
    return new Account(keypairBuffer);
}