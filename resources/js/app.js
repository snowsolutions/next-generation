import './bootstrap';
import { TableUtils } from './table-utils';
import { LeadAjax } from './ajax/lead';
import { AccountAjax } from './ajax/account';
import { CampaignAjax } from './ajax/campaign';
window.appAjax = {};
window.tableUtils = TableUtils
window.appAjax.lead = LeadAjax
window.appAjax.account = AccountAjax
window.appAjax.campaign = CampaignAjax
